<?php

namespace App\Repositories\Interfaces;

interface IWarehousePurchaseOrderSchduleRepository
{
    public function getPurchaseOrders($params);
    public function getPurchaseOrder($purchaseOrderId);
    public function createPurchaseOrder($data);
    public function updatePurchaseOrder($purchaseOrderId, $data);
    public function deletePurchaseOrder($purchaseOrderId);
}
