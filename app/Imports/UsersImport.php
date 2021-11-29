<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class UsersImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation, SkipsOnFailure
{

    use Importable, SkipsErrors, SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = new  User([
            'username' => $row['username'],
            'email' => $row['email'],
            'password' => bcrypt($row['password'])
        ]);

        $user->assignRole($row['rol']);
        return $user;
    }

    public function rules(): array
    {
        return [
               '*.username' => ['required','unique:users,username'],
               '*.email' => ['required','email', 'unique:users,email'],
               '*.password' => ['required']
        ];
    }


}
