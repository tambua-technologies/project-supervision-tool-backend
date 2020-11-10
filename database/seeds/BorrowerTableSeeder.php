<?php

use App\Models\Borrower;
use Illuminate\Database\Seeder;

class BorrowerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Borrower::class, 3)->create();
    }
}
