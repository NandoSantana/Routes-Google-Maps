<?php
namespace App\Http\Controllers;
use App\Info;
use App\CsvData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller {
    
    public function parseImport(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();

        if ($request->has('header')) 
        {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }

        if (count($data) > 0) 
        {
            if ($request->has('header')) 
            {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
           
            $csv_data = $data;
            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }

        return view('import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));
    }

    public function processImport(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);

        DB::table('info')->delete();
        
        foreach ($csv_data as $row) {
            $newAddres = new Info();

            foreach (config('app.db_fields') as $index => $field) {
               
                if ($data->csv_header) 
                {
                    $newAddres->$field = $row[$request->fields[$field]];
                } else {
                    $newAddres->$field = $row[$request->fields[$index]];
                }
               

            }
            // dd();
           
            $newAddres->save();
        }

        return redirect(url('googlemap/direction'));
        }


}