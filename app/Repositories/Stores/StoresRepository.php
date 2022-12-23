<?php

namespace App\Repositories\Stores;

use App\Repositories\Interfaces\IStoresRepository;
use App\Models\Stores\Store;
use App\Models\Stores\StoreProduct;

use Str;

class StoresRepository implements IStoresRepository
{
    public function getStores($params)
    {
        return Store::orderBy('id', 'desc')->get();
    }

    public function getStore($storeId)
    {
        
    }

    public function createStore($data)
    {
        $data['store_no'] = 'S-'.strtoupper(Str::random(10));
        $store = Store::create($data);

        return $store;
    }

    public function updateStore($storeId, $data)
    {
        
    }

    public function deleteStore($storeId)
    {
        
    }

    public function getProfile($storeNo)
    {
        $store = Store::with('pos', 'products')->withCount('products')->where('store_no', $storeNo)->first();
        return $store;
    }

    public function createTransaction($type, $data)
    {
        //
    }

    public function addProduct($data, $is_tracked_stocks)
    {
        $product = StoreProduct::where([
            'product_id' => $data['product_id'],
            'store_id' => $data['store_id']
        ])->first();

        if ($product)
        {
            if ($is_tracked_stocks)
            {
                $updatedStocks = intval($product->stocks) + intval($data['stocks']);
                $product->update([
                    'stocks' => $updatedStocks
                ]);

                return $product->refresh();
            }

            return $product;
        }

        if (!$is_tracked_stocks) $data['stocks'] = NULL;
        return StoreProduct::create($data);
    }

    public function removeProduct($data)
    {
        //
    }
}