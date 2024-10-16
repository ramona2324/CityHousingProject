<?php

namespace Database\Factories\Shelter;

use App\Models\Shelter\PurchaseOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    public function definition()
    {
        // Ensure that we pull existing Purchase Order IDs
        static $purchaseOrderIds;

        if (!$purchaseOrderIds) {
            // Cache and shuffle the Purchase Order IDs to minimize database hits
            $purchaseOrderIds = PurchaseOrder::pluck('id')->shuffle()->toArray();
        }

        // Faker logic to generate data
        return [
            'purchase_order_id' => $this->faker->randomElement($purchaseOrderIds),  // Relate to a Purchase Order
            'name' => $this->faker->words(3, true),  // Generate a random name with up to 100 characters
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
