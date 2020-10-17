<?php

use App\Accomplishment;
use Illuminate\Database\Seeder;

class AccomplishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Accomplishment::class, 50)->create();
    }
}
