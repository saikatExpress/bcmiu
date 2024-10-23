<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFilePath = base_path('database/data/division.csv');
        $csvFile     = fopen($csvFilePath, 'r');
        $firstLine   = true;

        while (($data = fgetcsv($csvFile, 2000, ',')) !== false) {
            if (!$firstLine) {
                $divisionObj             = new Division();
                $divisionObj->id         = $data[0];
                $divisionObj->name       = $data[1];
                $divisionObj->bn_name    = $data[2];
                $divisionObj->url        = $data[3];
                $divisionObj->created_at = Carbon::now();
                $divisionObj->updated_at = Carbon::now();

                $divisionObj->save();
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}