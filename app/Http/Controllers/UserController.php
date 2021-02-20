<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function insertRecord()
    {
        $phone          = new Phone();
        $phone->phone   = "0504397765";
        $user           = new User();
        $user->name     = "Aamer";
        $user->email    = "amir@gmail.com";
        $user->password = encrypt('12345678');
        $user->save();
        $user->phone()->save($phone);
        return "Record has been created successfully!";
    }

    public function fetchPhoneByUser($id)
    {
        $phone = User::find($id)->phone;
        return $phone;
    }
}
