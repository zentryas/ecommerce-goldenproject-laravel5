<?php

use Illuminate\Database\Seeder;
use App\Provinsi;
use App\Kota;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach ($daftarProvinsi as $provinceRow) 
        {
            Provinsi::create([
                'provinsi_id'       => $provinceRow['province_id'],
                'nama_provinsi'     => $provinceRow['province']
            ]);

            $daftarKota = RajaOngkir::kota()->dariProvinsi($provinceRow['province_id'])->get();
            foreach ($daftarKota as $cityRow)
            {
                Kota::create([
                    'provinsi_id' => $provinceRow['province_id'],
                    'kota_id'     => $cityRow['city_id'],
                    'nama_kota'   => $cityRow['city_name']
                ]);
            }
        }
    }
}
