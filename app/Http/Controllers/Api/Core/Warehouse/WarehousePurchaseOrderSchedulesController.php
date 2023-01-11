<?php

namespace App\Http\Controllers\Api\Core\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Repositories\Interfaces\IWarehousePurchaseOrderScheduleRepository;
use App\Http\Requests\Warehouse\WarehousePurchaseOrderScheduleRequest as PurchaseOrderRequest;

class WarehousePurchaseOrderSchedulesController extends Controller
{
    private IWarehousePurchaseOrderScheduleRepository $repository;

    public function __construct(
        IWarehousePurchaseOrderScheduleRepository $repository
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
            $data = $this->repository->getPurchaseOrders($params);

            return response()->json($data, 200);
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
    public function store(PurchaseOrderRequest $request) : JsonResponse
    {
        try
        {
            $data = $this->repository->createPurchaseOrder($request->validated());

            return response()->json($data, 201);
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
            $data = $this->repository->getPurchaseOrder($id);

            return response()->json($data, 200);
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
    public function update(PurchaseOrderRequest $request, $id) : JsonResponse
    {
        try
        {
            $data = $this->updatePurchaseOrder->getPurchaseOrder($id, $request->validated());

            return response()->json($data, 200);
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
            $data = $this->repository->deletePurchaseOrder($id);

            return response()->json($data, 204);
        } catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }
}
