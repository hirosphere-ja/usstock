<?php

use Illuminate\Database\Seeder;

class UsstocklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Usstockmarkets')->insert([
            [
                'ticker' => 'ibm',
                'stockname' => 'IBM',
                'market_id' => '1',
            ],
            [
                'ticker' => 'trip',
                'stockname' => 'トリップアドバイザー',
                'market_id' => '2',
            ],
            [
                'ticker' => 'pbi',
                'stockname' => 'ピツニーボウズ',
                'market_id' => '1',
            ]
        ]);
    }
}
