<?php

use Illuminate\Database\Seeder;

class MoneyTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('money')->delete();

        \DB::table('money')->insert(array(
            0 =>
                array(
                    'amount' => '189069453',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
            1 =>
                array(
                    'amount' => '252620546',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
            2 =>
                array(
                    'amount' => '555556480',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
            3 =>
                array(
                    'amount' => '882675809',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
            4 =>
                array(
                    'amount' => '789566181',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
            5 =>
                array(
                    'amount' => '320555928',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
            6 =>
                array(
                    'amount' => '123393950',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
            7 =>
                array(
                    'amount' => '265605683',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
            8 =>
                array(
                    'amount' => '216691775',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
            9 =>
                array(

                    'amount' => '873556743',
                    'currency_id' => 5,
                    'created_at' => '2021-04-01 14:34:20',
                    'updated_at' => '2021-04-01 14:34:20',
                    'deleted_at' => NULL,
                ),
        ));


    }
}