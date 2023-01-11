<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Warehouse\WarehousePurchaseOrderSchedule;

class WarehousePurchaseOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WarehousePurchaseOrderSchedule::factory()->count(100)->create();
    }
}
