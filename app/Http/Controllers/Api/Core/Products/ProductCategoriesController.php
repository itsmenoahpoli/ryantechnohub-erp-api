<?php

namespace App\Http\Controllers\Api\Core\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Repositories\Interfaces\IProductCategoriesRepository;
use App\Http\Requests\Products\ProductCategoryRequest;

class ProductCategoriesController extends Controller
{
    private IProductCategoriesRepository $repository;

    public function __construct(
        IProductCategoriesRepository $repository
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
            $data = $this->repository->getCategories($params);

            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request) : JsonResponse
    {
        try
        {
            $data = $this->repository->createCategory($request->validated());
            
            return response()->json($data, 201);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
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
            $data = $this->repository->getCategory($id);

            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, $id) : JsonResponse
    {
        try
        {
            $data = $this->repository->updateCategory($id, $request->validated());
            
            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
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
            $data = $this->repository->deleteCategory($id);
            
            return response()->json($data, 204);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
