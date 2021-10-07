<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientImportController extends Controller
{

    public function index()
    {
        return view('imports.index');
    }


    public function import(Request $request)
    {

//        php artisan queue:work database
        $file = $request->file('file');

        $import = new ClientsImport();
        Excel::import($import, $file);

        session()->flash("message", [
            "success",
            __("Los datos se han guardado correctamente, podra visualizarlos más adelante")
        ]);


        return redirect()->route('clients.index');
    }
}
