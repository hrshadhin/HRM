<?php

use Illuminate\Database\Seeder;
use App\Area;
use Carbon\Carbon;
class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::insert([
          ['name' => 'Dhanmondi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
