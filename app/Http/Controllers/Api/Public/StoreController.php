<?php

namespace App\Http\Controllers\Api\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Repositories\Interfaces\IStoresRepository;

class StoreController extends Controller
{
    private IStoresRepository $repository;

    public function __construct(
        IStoresRepository $repository
    )
    {
        $this->repository = $repository;
    }

    public function profile(Request $request, $storeNo) : JsonResponse
    {
        try
        {
            $data = $this->repository->getProfile($storeNo);
            return response()->json($data, 200);
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function checkoutOrder(Request $request) : JsonResponse
    {
        try
        {
            // 
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }

    public function voidOrder(Request $request) : JsonResponse
    {
        try
        {
            // 
        } catch (Exception $e)
        {
            return response()->json(['error' => true, 'message' => $e->getMessage()], 500);
        }
    }
}
