<?php
// namespace App\Imports;

// use Hash;
// use App\Models\User;
// use Maatwebsite\Excel\Concerns\ToModel;
// use Illuminate\Support\Facades\Hash as Enter;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

// class UsersImport implements ToModel, WithHeadingRow
// {
//     /**
//     * @param array $row
//     *
//     * @return \Illuminate\Database\Eloquent\Model|null
//     */
//     public function model(array $row)
//     {
//         return new User([
//             'name'     => $row['name'],
//             'email'    => $row['email'], 
//             'password' => Enter::make($row['password']),
//         ]);
//     }
// }