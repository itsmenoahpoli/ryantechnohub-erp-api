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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) : JsonResponse
    {
        try
        {
            $params = $request->query();
            $data = $this->repository->getProductsImages($params);

            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
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
            return response()->json($data, 201);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified product image in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : JsonResponse
    {
        try
        {
            $data = $this->repository->deleteImage($id);
            return response()->json($data, 204);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
