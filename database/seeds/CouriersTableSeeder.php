<?php

use Illuminate\Database\Seeder;
use App\Kurir;

class CouriersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode' => 'jne', 'ekspedisi' => 'JNE'],
            ['kode' => 'pos', 'ekspedisi' => 'POS'],
            ['kode' => 'tiki', 'ekspedisi' => 'TIKI']
        ];
        Kurir::insert($data);
    }
}
