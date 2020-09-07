<?php
use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run()
    {

        $statuses = [
            ['id' => 1, 'name' => 'PENDING_PAYMENT'],
            ['id' => 2, 'name' => 'PAYED'],
            ['id' => 3, 'name' => 'BOX_LOADING'],
            ['id' => 4, 'name' => 'SEND_TO_CUSTOMER'],
            ['id' => 5, 'name' => 'DELIVERED'],
            ['id' => 6, 'name' => 'PRODUCT_REFUND'],
            ['id' => 7, 'name' => 'REFUNDED'],
           ];


        foreach ($statuses as $item) {
            Status::updateOrCreate($item);
        }
    }
}

