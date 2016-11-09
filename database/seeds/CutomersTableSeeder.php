<?php

use Illuminate\Database\Seeder;

class CutomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Customer::class, 20)->create();

    }
}
