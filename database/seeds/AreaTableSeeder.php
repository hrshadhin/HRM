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
          ['name' => 'Gulshan','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Jatrabari','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Khilkhet','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Mohammadpur','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Savar','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ['name' => 'Uttara','created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
