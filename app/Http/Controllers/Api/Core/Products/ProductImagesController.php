<?php

namespace App\Http\Controllers\Api\Core\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Repositories\Interfaces\IProductsRepository;
use App\Http\Requests\Products\ProductImageRequest;

class ProductImagesController extends Controller
{
    private IProductsRepository $repository;

    public function __construct(
        IProductsRepository $repository
    )
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created product image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(ProductImageRequest $request) : JsonResponse
    {
        try
        {
            $data = $this->repository->uploadImage($request->product_id, $request->images);
            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }
}
