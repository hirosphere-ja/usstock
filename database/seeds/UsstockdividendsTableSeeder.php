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
                'announceday' => '20191029',
                'exrights' => '20191107',
                'paymentday' => '20191210',
                'dividend' => '1.62',
            ],
            [
                'ticker' => 'ibm',
                'announceday' => '20190730',
                'exrights' => '20190808',
                'paymentday' => '20190910',
                'dividend' => '1.62',
            ],
            [
                'ticker' => 'ibm',
                'announceday' => '20200128',
                'exrights' => '20200207',
                'paymentday' => '20200310',
                'dividend' => '1.62',
            ],
            [
                'ticker' => 'trip',
                'announceday' => '20191108',
                'exrights' => '20191119',
                'paymentday' => '20191204',
                'dividend' => '3.5',
            ],
            [
                'ticker' => 'cva',
                'announceday' => '20191212',
                'exrights' => '20191226',
                'paymentday' => '20200103',
                'dividend' => '0.25',
            ],
            [
                'ticker' => 'cva',
                'announceday' => '20190918',
                'exrights' => '20190926',
                'paymentday' => '20191004',
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
                'announceday' => '20191114',
                'exrights' => '20191127',
                'paymentday' => '20191213',
                'dividend' => '0.575',
            ],
            [
                'ticker' => 'pbi',
                'announceday' => '20191108',
                'exrights' => '20191118',
                'paymentday' => '20191210',
                'dividend' => '0.05',
            ],
            [
                'ticker' => 'pbi',
                'announceday' => '20190806',
                'exrights' => '20190822',
                'paymentday' => '20190911',
                'dividend' => '0.05',
            ],
        ]);
    }
}
