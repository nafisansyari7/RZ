<?php

namespace App\Imports;

use App\User;
use App\Dosen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            $user = User::create([
                'name' => $row['name'],
                'username' => $row['nidn'],
                'email' => $row['email'],
                'password' => Hash::make($row['nidn']),
                'role' => ('Dosen'),
            ]);

            $dosen = Dosen::create([
                'nidn' => $row['nidn'],
                'nip' => $row['nip'],
                'nama' => $row['name'],
                'kuota' => ('4'),
                'user_id' => $user->id,
            ]);
        }
    }
}
