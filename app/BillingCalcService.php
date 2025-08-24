<?php

namespace App;

use App\Models\Client;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use Carbon\Carbon;
use Illuminate\Support\Number;

class BillingCalcService {

    var $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function isCellEmpty($sheet, string $addr): bool {
        $val = $sheet->getCell($addr)->getValue();

        if ($val instanceof RichText) $val = $val->getPlainText();

        if ($val === null) return true;

        if (is_string($val)) {
            $val = str_replace("\xC2\xA0", ' ', $val); // NBSP -> space
            return trim($val) === '';
        }

        return false;
    }

    public function getMultiplier(Carbon $date, $did_use_master_file)
    {
        //  true as that third param is for inclusivity
        if ($date->isBetween(Carbon::create(2021,7,1,0,0,0), Carbon::create(2022,7,1,0,0,0), true)) {
            return $did_use_master_file ? .55 : 2.0; 
        } else if ($date->isBetween(Carbon::create(2022,7,2,0,0,0), Carbon::create(2023,7,1,0,0,0), true)) {
            return $did_use_master_file ? .54 : 1.95; 
        } else {
            return $did_use_master_file ? .525 : 1.9;
        }
    }

    public function calculate(string $uploaded_path)
    {
        $spreadsheet = IOFactory::load($uploaded_path);
        $sheet       = $spreadsheet->getActiveSheet();
        //  TODO: start row as a parameter
        $row         = 7;

        while (!$this->isCellEmpty($sheet, "A{$row}") || !$this->isCellEmpty($sheet, "B{$row}")) {
            $cpt_code = $sheet->getCell("F{$row}")->getValue();

            if (!$cpt_code) {
                $row++;
                continue;
            }

            $mod      = $sheet->getCell("G{$row}")->getValue();
            $quantity = $sheet->getCell("H{$row}")->getValue();
            $raw_date = $sheet->getCell("E{$row}")->getValue();
            $date     = Carbon::instance(ExcelDate::excelToDateTimeObject($raw_date))->midDay();

            $rows = $this->client->fees()->where('cpt_code', $cpt_code)
                ->whereDate('period_start' ,'<=', $date)
                ->whereDate('period_end', '>=', $date)
                ->get();

            //  for now uses the first one
            if (count($rows) > 0) {
                $billing_data = $rows[0];
                $multiplier   = $this->getMultiplier($date, Carbon::parse($billing_data->period_start)->lt(Carbon::create(2000,1,1,0,0,0)));

                $sheet->setCellValue("O{$row}", Number::currency($billing_data->price_in_cents / 100));
                $sheet->setCellValue("P{$row}", $multiplier);
                $sheet->setCellValue("Q{$row}", Number::currency(($multiplier * $billing_data->price_in_cents) / 100));
            } else {
                $sheet->setCellValue("O{$row}", "No dice!");
            }

            $row++;
            // (Optional safety guard)
            if ($row > 1_000_000) { throw new \RuntimeException('Row guard tripped'); }
        }
        
        return $spreadsheet;
    }
}