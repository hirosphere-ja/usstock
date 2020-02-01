<?php

use Illuminate\Database\Seeder;

class UsstockmarketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB：table('Usstockmarkets')->insert([
            [
                'market' => 'NYSE'
            ],
            [
                'market' => 'NASDAQ'
            ]
        ]);
    }
}
