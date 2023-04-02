<?php

namespace App\Imports;

use App\Models\AirPort;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class AirportImport implements
    ToModel,
    WithValidation,
    WithBatchInserts,
    SkipsOnError
{
    use Importable, SkipsErrors;

    public function model(array $row)
    {
      return new AirPort([
        'id' => $row[0],
        'shortcode' => $row[1],
        'name' => $row[2],
        'country'=> $row[3],
        'city'=> $row[4],
        'location' => $row[5]
      ]);
    }

    public function rules(): array
    {
        return [

        ];
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
