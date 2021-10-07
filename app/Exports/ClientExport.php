<?php

namespace App\Exports;

use App\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ClientExport implements WithMapping, WithHeadings, FromCollection, ShouldQueue
{
    use Exportable;

    protected $offset;


    public function __construct($offset)
    {

        $this->offset = $offset;
    }

    public function collection()
    {
        if ($this->offset) {
            $data = Client::with('city')
                ->offset($this->offset)
                ->take(1000)
                ->get();
        } else {
            $data = Client::with('city')
                ->get();
        }

        return $data;
    }

    public function map($client): array
    {
        return [
            $client->cod,
            $client->name,
            $client->city->name,
        ];
    }

    public function headings(): array
    {
        return [
            'Codigo',
            'Nombre',
            'Ciudad'
        ];
    }

//    public function query()
//    {
//        return Client::query()->with('city')->take(10);
//    }
}
