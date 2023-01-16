<?php

namespace App\Repositories\Warehouse;

use App\Repositories\Interfaces\IWarehouseDeliverySchedulesRepository;
use App\Models\Warehouse\WarehouseDeliverySchedule as DeliverySchedule;

use Str;

class WarehouseDeliverySchedulesRepository implements IWarehouseDeliverySchedulesRepository
{
    public function getDeliverySchedules($params)
    {
        $deliverySchedules = DeliverySchedule::query();
        return $deliverySchedules->orderBy('delivery_date', 'DESC')->get();
    }

    public function getDeliverySchedule($deliveryId)
    {
        $deliverySchedule = DeliverySchedule::findOrFail($id);
        return $deliverySchedule;
    }

    public function createDeliverySchedule($data)
    {
        $data['delivery_no'] = 'D-'.time().strtoupper(Str::random(5));
        $deliverySchedule = DeliverySchedule::create($data);
        return $deliverySchedule;
    }

    public function updateDeliverySchedule($deliveryId, $data)
    {
        $deliverySchedule = $this->getDeliverySchedule($deliveryId)->update($data);
        return $deliverySchedule;
    }

    public function deleteDeliverySchedule($deliveryId)
    {
        $deliverySchedule = $this->getDeliverySchedule($deliveryId)->forceDelete();
        return $deliverySchedule;
    }

}
