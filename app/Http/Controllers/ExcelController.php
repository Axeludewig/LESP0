<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CursosExport;

use App\Exports\UsersFormExport;
use App\Imports\UsersFormImport;
use Maatwebsite\Excel\Reader\Xlsx;
use Maatwebsite\Excel\Writer\Xlsx as XlsxWriter;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelController extends Controller
{
    public function cartadescriptiva(){
    // Load the Excel template
    $template = Excel::load('cartad.xlsx');

    // Modify the template
    $sheet = $template->getActiveSheet();
    $sheet->setCellValue('A1', 'Modified Value');

    // Save the modified template as a new file
    $template->save('modified.xlsx');

    // Download the modified file
    return Excel::download('modified.pdf');
}
public function export() 
    {
        return Excel::download(new CursosExport, 'cursos.xlsx');
    }
}