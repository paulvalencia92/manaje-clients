<?php

namespace App\Http\Controllers;

use App\{Client, Export};
use App\Exports\ClientExport;
use Illuminate\Http\Request;

class ClientExportController extends Controller
{
    public function exportToExcel()
    {

        if (Client::count() >= 1000) {
            $array = $this->elements();
            foreach ($array as $offset) {
                $name = "clientes-from-{$offset}.xlsx";
                $this->saveFile($name);
                //php artisan queue:work database --queue="excel"
                (new ClientExport($offset))->queue("public/exports/{$name}")->onQueue('excel');
            }

            session()->flash("message", [
                "success",
                __("La exportación ha comenzado, revisa mas tarde en el modulo de exportaciones para descargar los archivos")
            ]);
            return back();

        } else {
            return (new ClientExport(null))->download("clients.xlsx");
        }


    }


    public function saveFile($name)
    {
        Export::create([
            'name' => 'Clientes',
            'file_name' => $name
        ]);
    }


    private function elements()
    {
        $clientsCount = Client::count();

        $array = collect();

        $i = 1000;
        $increment = 1000;
        while ($i <= $clientsCount) {
            if ($i <= 1000) {
                $array->push($i); // 1000
                $last = $i + 1; // 1001;
                $array->push($last);
                $i = $last;
            } else {
                $i += $increment + 1;
                $array->push($i);
            }
        }

        return $array;

    }

}
