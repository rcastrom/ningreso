<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PreformatosExport;
use App\Imports\PreformatosImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Support\Collection
     */
    public function importExportView(){
        return view('import');
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(){
        return Excel::download(new PreformatosExport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function import(){
        Excel::import(new PreformatosImport(),request()->file('file'));
        return back();
    }
}
