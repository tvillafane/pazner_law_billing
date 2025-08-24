<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\CptCode;
use Carbon\Carbon;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $synergy = Client::create([
        //     'name' => 'Synergy Health Partners'
        // ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $mendelson = Client::create([
            'name' => 'Mendelson Orthopedics',
            'slug' => 'mendelson'
        ]);

        $cpt_files = [
            [
                'period_start' => Carbon::create(1999,1,1,0,0,0),
                'period_end'   => Carbon::create(2022,12,31,0,0,0),
                'filename'     => '2019_master.csv',
            ],
            [
                'period_start' => Carbon::create(2023,1,1,0,0,0),
                'period_end'   => Carbon::create(2023,12,31,0,0,0),
                'filename'     => '2023.csv',
            ],
            [
                'period_start' => Carbon::create(2024,1,1,0,0,0),
                'period_end'   => Carbon::create(2024,3,8,0,0,0),
                'filename'     => 'jan_1_mar_8_2024.csv',
            ],
            [
                'period_start' => Carbon::create(2024,3,9,0,0,0),
                'period_end'   => Carbon::create(2024,12,31,0,0,0),
                'filename'     => 'mar_9_dec_31_2024.csv',
            ],
            [
                'period_start' => Carbon::create(2025,1,1,0,0,0),
                'period_end'   => Carbon::create(2025,12,31,0,0,0),
                'filename'     => '2025.csv',
            ],
        ];

        $rows = [];
        $now  = now();

        foreach ($cpt_files as $cpt_file) {
            $filepath     = base_path('database/seeders/' . $mendelson->slug . '/' . $cpt_file['filename']);
            $period_start = $cpt_file['period_start']->startOf('day');
            $period_end   = $cpt_file['period_end']->endOf('day');
;
            if (($handle = fopen($filepath, 'r')) !== false) {
                $headers    = fgetcsv($handle);
                $headers[0] = preg_replace('/^\xEF\xBB\xBF|\x{FEFF}/u', '', (string)$headers[0]); // strip BOM

                while (($row = fgetcsv($handle)) !== false) {
                    $data = array_combine($headers, $row);

                    //  "14.00" => 1400 - price string to cents
                    $price_in_cents = (int) round((float) str_replace(',', '', $data['PAR_AMOUNT']) * 100);
                    $mod            = $data['MOD'] ?? null;

                    $rows[] = [
                        'created_at'             => $now,
                        'updated_at'             => $now,
                        'description'            => $data['DESC'] ?? null,
                        'client_id'              => $mendelson->id,
                        'period_start'           => $period_start,
                        'period_end'             => $period_end,
                        'price_in_cents'         => $price_in_cents,
                        'mod'                    => $mod,
                        'is_facility_pricing'    => isset($data['NOTE']) && $data['NOTE'] == '#',
                        'cpt_code'               => $data['PROCEDURE']
                    ];

                    if (count($rows) == 1000) {
                        CptCode::insert($rows);
                        $rows = [];
                    }  
                }

                fclose($handle);
            } else {
                echo "WTF";
            };
        }

        CptCode::insert($rows);
    }
}
