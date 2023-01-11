<?php

namespace App\Repositories\Interfaces;

interface IWarehouseDeliverySchedulesRepository
{
    public function getDeliverySchedules($params);
    public function getDeliverySchedule($deliveryId);
    public function createDeliverySchedule($data);
    public function updateDeliverySchedule($deliveryId, $data);
    public function deleteDeliverySchedule($deliveryId);
}
