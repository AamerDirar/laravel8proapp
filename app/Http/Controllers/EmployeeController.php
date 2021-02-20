<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function addEmployee()
    {
        $employees = [
            [
                "name"       => "Ali",
                "email"      => "ali@gmail.com",
                "phone"      => "0504332211",
                "salary"     => "20000",
                "department" => "Accounting"
            ],
            [
                "name"       => "Alaa",
                "email"      => "alaa@gmail.com",
                "phone"      => "0504322211",
                "salary"     => "21000",
                "department" => "Marketting"
            ],
            [
                "name"       => "Osman",
                "email"      => "osman@gmail.com",
                "phone"      => "0501232211",
                "salary"     => "22000",
                "department" => "Quality"
            ],
            [
                "name"       => "Walaa",
                "email"      => "walaa@gmail.com",
                "phone"      => "0504532211",
                "salary"     => "21000",
                "department" => "Accounting"
            ],
            [
                "name"       => "Omer",
                "email"      => "omer@gmail.com",
                "phone"      => "0514332211",
                "salary"     => "22000",
                "department" => "Marketting"
            ],
        ];

        Employee::insert($employees);
        return "Records are inserted";
    }
}
