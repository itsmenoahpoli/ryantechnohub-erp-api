<?php

namespace Database\Factories\Warehouse;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Warehouse\WarehousePurchaseOrderSchedule;

use Carbon\Carbon;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WarehousePurchaseOrderScheduleFactory extends Factory
{
    protected $model = WarehousePurchaseOrderSchedule::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $puchaseOrderNo = Carbon::now()->format('Ymd').strtoupper(Str::random(5));
        $items = [
            (object) [
                'name' => 'product name',
                'quantity' => 32,
                'remarks' => $this->faker->sentence()
            ],
            (object) [
                'name' => 'product name',
                'quantity' => 32,
                'remarks' => $this->faker->sentence()
            ],
            (object) [
                'name' => 'product name',
                'quantity' => 32,
                'remarks' => $this->faker->sentence()
            ],
            (object) [
                'name' => 'product name',
                'quantity' => 32,
                'remarks' => $this->faker->sentence()
            ],
            (object) [
                'name' => 'product name',
                'quantity' => 32,
                'remarks' => $this->faker->sentence()
            ],
        ];

        return [
            'purchase_order_no' => $puchaseOrderNo,
            'vendor_company_name' => $this->faker->company(),
            'vendor_company_email' => $this->faker->safeEmail(),
            'vendor_address' => $this->faker->address(),
            'ship_to_phone_no' => $this->faker->phoneNumber(),
            'vendor_phone_no' => $this->faker->phoneNumber(),
            'ship_to_phone_no' => $this->faker->phoneNumber(),
            'ship_to_name' => $this->faker->name(),
            'ship_to_address' => $this->faker->address(),
            'ship_to_phone_no' => $this->faker->phoneNumber(),
            'ship_to_phone_no' => $this->faker->phoneNumber(),
            'ship_to_fax_no' => $this->faker->phoneNumber(),
            'items' => json_encode($items),
            'shipping_method' => 'delivery-truck',
            'delivery_date' => Carbon::now()->format('Y-m-d')
        ];
    }
}
