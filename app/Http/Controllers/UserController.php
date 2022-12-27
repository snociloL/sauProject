<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Imports\UsersImport;
// use Maatwebsite\Excel\Facades\Excel;
// use App\Models\User;

// class UserController extends Controller
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function index()
//     {
//         $users = User::get();
  
//         return view('users', compact('users'));
//     }
        
//     /**
//     * @return \Illuminate\Support\Collection
//     */
       
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function import() 
//     {
//         Excel::import(new UsersImport,request()->file('file'));
//         return back();
//     }
// }