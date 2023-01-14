<?php

namespace App\Repositories\Warehouse;

use App\Repositories\Interfaces\IWarehousePurchaseOrderScheduleRepository;
use App\Models\Warehouse\WarehousePurchaseOrderSchedule as PurchaseOrder;

use Str;

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
        $data['purchase_order_no'] = 'P-'.time().strtoupper(Str::random(5));
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
