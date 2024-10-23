<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Upazila;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UpazilaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFilePath = base_path('database/data/upazila.csv');
        $csvFile     = fopen($csvFilePath, 'r');
        $firstLine   = true;

        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (!$firstLine) {
                $upazilaObj              = new Upazila();
                $upazilaObj->id          = $data[0];
                $upazilaObj->district_id = $data[1];
                $upazilaObj->name        = $data[2];
                $upazilaObj->bn_name     = $data[3];
                $upazilaObj->url         = $data[4];
                $upazilaObj->created_at  = Carbon::now();
                $upazilaObj->updated_at  = Carbon::now();

                $upazilaObj->save();
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}