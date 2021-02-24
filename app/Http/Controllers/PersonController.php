<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function addPerson()
    {
        $person        = new Person();
        $person->name  = "AamerD";
        $person->email = "AMIRD@yahoo.com";
        $person->phone = "1234437890";
        $person->save();
        return "Record Inserted";
    }

    public function getPeople()
    {
        return Person::all();
    }
}
