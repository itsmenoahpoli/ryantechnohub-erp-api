<?php

namespace App\Repositories\Products;

use App\Repositories\Interfaces\IProductsRepository;
use App\Repositories\Interfaces\IStoresRepository;
use App\Models\Products\Product;
use App\Models\Products\ProductImage;
use App\Models\Products\ProductStockLog;
use App\Services\FilesService;

use Str;
use DB;

class ProductsRepository implements IProductsRepository
{
	private $store;

	public function __construct(
		IStoresRepository $store
	)
	{
		$this->store = $store;
	}

	public function getProducts($params)
	{
    return Product::orderBy('id', 'DESC')->get();
	}

	public function getProduct($productId)
	{
		$product = Product::findOrFail($productId);
		return $product;
	}

	public function createProduct($data)
	{

	}

	public function updateProduct($productId, $data)
	{
		$product = $ths->getProduct($productId)->update($data);

		return $this->getProduct($productId);
	}

	public function deleteProduct($productId)
	{

	}

	public function uploadImage($productId, $images)
	{
		$sku = $this->getProduct($productId)->sku;

		foreach ($images as $image)
		{
			$extension = $image->getCLientOriginalExtension();
			$filename = $sku.Str::random(6).'image.'.$extension;
			$filepath = 'products/images';
			FilesService::upload($image, $filepath, $filename, false);

			ProductImage::create([
				'product_id' => $productId,
				'url' => '/storage'.'/'.$filepath.'/'.$filename
			]);
		}
	}
	
	public function instockProduct($data)
	{
		return $data;
	}

	public function outstockProduct($data)
	{
		$product = $this->getProduct($data['product_id']);
		$storeProduct = $this->store->addProduct($data, $product->is_tracked_stocks);

		if ($product->is_tracked_stocks && $product->stocks < $data['stocks'])
		{
			return 'INSUFFICIENT_WAREHOUSE_STOCKS';
		}

		if ($product->is_tracked_stocks && $data['stocks'] === 0 || $data['stocks'] < 0)
		{
			return 'INVALID_OUTSTOCK_REQUEST';
		}

		if ($product->is_tracked_stocks && $product->stocks === 0)
		{
			return 'OUT_OF_STOCKS_IN_WAREHOUSE';
		}

		if ($product->is_tracked_stocks)
		{
			$product->update([
				'stocks' => intval($product->stocks) - intval($data['stocks'])
			]);
		}

		$this->recordProductStockLog([
			'type' => 'out-stocks',
			'product_id' => $data['product_id'],
			'store_id' => $data['store_id'],
			'stocks' => $product->is_tracked_stocks ? $data['stocks'] : 'UNTRACKED'
		]);

		return 'OUTSTOCK_PRODUCT_SUCCESS';
	}

	public function batchOutstockProduct($data)
	{
		$outstockProducts = [];

		DB::transaction(function() {
			foreach ($data->products as $product)
			{
				$this->outstockProduct([
					'store_id' => $data->store_id,
					'product_id' => $product['product_id'],
					'stocks' => $product['stocks']
				]);
			}

			return 'BATCH_OUTSTOCK_PRODUCTS_SUCCESS';
		});
	}

	private function recordProductStockLog($data)
	{
		return ProductStockLog::create($data);
	}
}