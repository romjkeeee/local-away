<?php

use App\Measurement;
use App\Age;
use App\Feet;
use Illuminate\Database\Seeder;

class PreferencesSeeder extends Seeder
{
    public function run()
    {

        $measurement = [
            ['id' => 1, 'name' => 'imperial'],
            ['id' => 2, 'name' => 'metric'],
        ];


        foreach ($measurement as $item) {
            Measurement::query()->updateOrCreate($item);
        }

        $age = [
            ['id' => 1, 'name' => '18-20'],
            ['id' => 2, 'name' => '20-25'],
            ['id' => 3, 'name' => '25-30'],
            ['id' => 4, 'name' => '30-35'],
            ['id' => 5, 'name' => '35-40'],
            ['id' => 6, 'name' => '40-45'],
            ['id' => 7, 'name' => '50-55'],
            ['id' => 8, 'name' => '55+'],
        ];


        foreach ($age as $item) {
            Age::query()->updateOrCreate($item);
        }


        $age = [
            ['id' => 1, 'measurement_id' => 2, 'name' => '35'],
            ['id' => 2, 'measurement_id' => 2, 'name' => '36'],
            ['id' => 3, 'measurement_id' => 2, 'name' => '37'],
            ['id' => 4, 'measurement_id' => 2, 'name' => '38'],
            ['id' => 5, 'measurement_id' => 2, 'name' => '39'],
            ['id' => 6, 'measurement_id' => 2, 'name' => '40'],
            ['id' => 7, 'measurement_id' => 2, 'name' => '41'],
            ['id' => 8, 'measurement_id' => 2, 'name' => '42'],
            ['id' => 9, 'measurement_id' => 1, 'name' => '5.5'],
            ['id' => 10, 'measurement_id' => 1, 'name' => '6'],
            ['id' => 11, 'measurement_id' => 1, 'name' => '6.5'],
            ['id' => 12, 'measurement_id' => 1, 'name' => '7'],
            ['id' => 13, 'measurement_id' => 1, 'name' => '7.5'],
            ['id' => 14, 'measurement_id' => 1, 'name' => '8'],
            ['id' => 15, 'measurement_id' => 1, 'name' => '8.5'],
            ['id' => 16, 'measurement_id' => 1, 'name' => '9'],
            ['id' => 17, 'measurement_id' => 1, 'name' => '9.5'],
            ['id' => 18, 'measurement_id' => 1, 'name' => '10'],
            ['id' => 19, 'measurement_id' => 1, 'name' => '10.5'],
            ['id' => 20, 'measurement_id' => 1, 'name' => '11'],
            ['id' => 21, 'measurement_id' => 1, 'name' => '11.5'],
        ];


        foreach ($age as $item) {
            Feet::query()->updateOrCreate($item);
        }

    }
}

