<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IWarehousePurchaseOrderScheduleRepository;
use App\Models\Warehouse\WarehousePurchaseOrderSchedule as PurchaseOrder;

class WarehousePurchaseOrderScheduleRepository implements IWarehousePurchaseOrderScheduleRepository
{
    public function getPurchaseOrders($params)
    {
        $purchaseOrders = PurchaseOrder::query();
        return $purchaseOrders->orderBy('delivery_date', 'DESC')->get();
    }

    public function getPurchaseOrder($purchaseOrderId)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($purchaseOrderId);
        return $purchaseOrder;
    }

    public function createPurchaseOrder($data)
    {
        $purchaseOrder = PurchaseOrder::create($data);
        return $purchaseOrder;
    }

    public function updatePurchaseOrder($purchaseOrderId, $data)
    {
        $purchaseOrder = $this->getPurchaseOrder($purchaseOrderId)->update($data);
        return $purchaseOrder;
    }

    public function deletePurchaseOrder($purchaseOrderId)
    {
        $purchaseOrder = $this->getPurchaseOrder($purchaseOrderId)->forceDelete();
        return $purchaseOrder;
    }

}
