<?php

namespace App\Imports;

use App\User;
use App\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) 
        {
            $user = User::updateOrCreate(
                ['username' => $row['nim']],
                [
                    'name' => $row['nama'],
                    'password' => Hash::make($row['nim']),
                    'role' => ('Mahasiswa'),
                ]
            );

            $mahasiswa = Mahasiswa::updateOrCreate(
                ['nim' => $row['nim']],
                [
                    'nama' => $row['nama'],
                    'status' => $row['status'],
                    'user_id' => $user->id,
                    'angkatan' => $row['angkatan'],
                ]
            );
        }
    }
}
