<?php

use Illuminate\Database\Seeder;

class UsstockdividendsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Usstockdividends')->insert([
            [
                'ticker' => 'ibm',
                'announceday' => '2019-10-29',
                'exrights' => '2019-11-07',
                'paymentday' => '2019-12-10',
                'dividend' => '1.62',
            ],
            [
                'ticker' => 'ibm',
                'announceday' => '2019-07-30',
                'exrights' => '2019-08-08',
                'paymentday' => '2019-09-10',
                'dividend' => '1.62',
            ],
            [
                'ticker' => 'ibm',
                'announceday' => '2020-01-28',
                'exrights' => '2020-02-07',
                'paymentday' => '2020-03-10',
                'dividend' => '1.62',
            ],
            [
                'ticker' => 'trip',
                'announceday' => '2019-11-08',
                'exrights' => '2019-11-19',
                'paymentday' => '2019-12-04',
                'dividend' => '3.5',
            ],
            [
                'ticker' => 'cva',
                'announceday' => '2019-12-12',
                'exrights' => '2019-12-26',
                'paymentday' => '2020-01-03',
                'dividend' => '0.25',
            ],
            [
                'ticker' => 'cva',
                'announceday' => '2019-09-18',
                'exrights' => '2019-09-26',
                'paymentday' => '2019-10-04',
                'dividend' => '0.25',
            ],
            [
                'ticker' => 'mdp',
                'announceday' => '20190808',
                'exrights' => '20190829',
                'paymentday' => '20190913',
                'dividend' => '0.575',
            ],
            [
                'ticker' => 'mdp',
                'announceday' => '2019-11-14',
                'exrights' => '2019-11-27',
                'paymentday' => '2019-12-13',
                'dividend' => '0.575',
            ],
            [
                'ticker' => 'pbi',
                'announceday' => '2019-11-08',
                'exrights' => '2019-11-18',
                'paymentday' => '2019-12-10',
                'dividend' => '0.05',
            ],
            [
                'ticker' => 'pbi',
                'announceday' => '2019-08-06',
                'exrights' => '2019-08-22',
                'paymentday' => '2019-09-11',
                'dividend' => '0.05',
            ],
        ]);
    }
}
