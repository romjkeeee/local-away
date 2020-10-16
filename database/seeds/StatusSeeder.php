<?php
use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {

        $statuses = [
            ['id' => 1, 'name' => 'PENDING_PAYMENT', 'color' => '#FF4C3B'],
            ['id' => 2, 'name' => 'BOX_PAYED', 'color' => '#02BFAF'],
            ['id' => 3, 'name' => 'SHOP_PAYED', 'color' => '#02BFAF'],
            ['id' => 4, 'name' => 'BOX_AND_SHOP_PAYED', 'color' => '#02BFAF'],
            ['id' => 5, 'name' => 'BOX_LOADING', 'color' => '#02BFAF'],
            ['id' => 6, 'name' => 'SEND_TO_CUSTOMER', 'color' => '#02BFAF'],
            ['id' => 7, 'name' => 'DELIVERED', 'color' => '#111111'],
            ['id' => 8, 'name' => 'PAYMENT_FAILED', 'color' => '#111111'],
            ['id' => 9, 'name' => 'FULL_PAYMENT', 'color' => '#02BFAF'],
            ['id' => 10, 'name' => 'PRODUCT_REFUND', 'color' => '#FF4C3B'],
            ['id' => 11, 'name' => 'REFUNDED', 'color' => '#111111'],
            ['id' => 12, 'name' => 'COMPLETED', 'color' => '#02BFAF'],
           ];


        foreach ($statuses as $item) {
            Status::updateOrCreate($item);
        }
    }
}

