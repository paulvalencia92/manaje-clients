<?php

namespace App\Imports;

use App\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class ClientsImport implements ToModel, SkipsOnError, WithHeadingRow, WithChunkReading, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Client([
            'cod' => $row['codigo'],
            'name' => $row['nombre'],
            'city_id' => 1,
        ]);
    }

    public function onError(Throwable $e)
    {
        // TODO: Implement onError() method.
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
