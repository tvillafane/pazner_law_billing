<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\BillingCalcService;
use App\Models\Client;

class ProcessorController extends Controller
{
    public function processFile(Request $request)
    {
         $validated = $request->validate([
            'client_id' => 'required|in:' . Client::all()->pluck('id')->join(','),
            'file' => [
                'required',
                'file',
                'mimes:xlsx',
                'max:20480', // 20MB
            ],
        ]);

        $file          = $validated['file'];
        $client        = Client::find($validated['client_id']);
        $service       = new BillingCalcService($client);

        $filename      = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $download_name = Str::slug($filename) . '_updated.xlsx';
        $spreadsheet   = $service->calculate($file->getPathname());

        return response()->streamDownload(function () use ($spreadsheet) {
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save('php://output');
        }, $download_name, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ]);
    }
}