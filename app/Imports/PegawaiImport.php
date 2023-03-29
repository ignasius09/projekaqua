<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pegawai([
            'shareid' => $row[1],
            'nama' => $row[2],
            'jeniskelamin' => $row[3],
            'alamat' => $row[4],
            'notelpon' => $row[5],
            'foto' => $row[6]

        ]);
    }
}
