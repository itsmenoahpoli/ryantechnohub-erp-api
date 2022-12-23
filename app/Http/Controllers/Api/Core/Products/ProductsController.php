<?php

namespace App\Http\Controllers\Api\Core\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Repositories\Interfaces\IProductsRepository;
use App\Http\Requests\Products\ProductOutstockRequest;
use App\Http\Requests\Products\ProductBatchOutstockRequest;

class ProductsController extends Controller
{
    private IProductsRepository $repository;

    public function __construct(
        IProductsRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function outstock(ProductOutstockRequest $request)
    {
        try
        {
            $data = $this->repository->outstockProduct($request->validated());

            if ($data !== 'OUTSTOCKED_PRODUCT')
            {
                return response()->json($data, 400);
            }
            return response()->json($data, $data === 'OUTSTOCKED_PRODUCT' ? 200 : 400);
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function batchOutstock(ProductBatchOutstockRequest $request)
    {
        try
        {
            $data = $this->repository->batchOutstockProduct((object) $request->validated());
            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : JsonResponse
    {
        try
        {

        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : JsonResponse
    {
        try
        {

        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : JsonResponse
    {
        try
        {

        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) : JsonResponse
    {
        try
        {

        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : JsonResponse
    {
        try
        {

        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }
}
