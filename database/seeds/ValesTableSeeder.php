<?php

use Illuminate\Database\Seeder;

class ValesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Vale::class, 20)->create();
    }
}
