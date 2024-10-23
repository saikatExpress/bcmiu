<?php

namespace Database\Seeders;

use App\Models\District;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFilePath = base_path('database/data/district.csv');
        $csvFile     = fopen($csvFilePath, 'r');
        $firstLine   = true;

        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (!$firstLine) {
                $districtObj              = new District();
                $districtObj->id          = $data[0];
                $districtObj->division_id = $data[1];
                $districtObj->name        = $data[2];
                $districtObj->bn_name     = $data[3];
                $districtObj->lat         = $data[4];
                $districtObj->lon         = $data[5];
                $districtObj->url         = $data[6];
                $districtObj->created_at  = Carbon::now();
                $districtObj->updated_at  = Carbon::now();

                $districtObj->save();
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}