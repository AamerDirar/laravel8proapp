<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Models\Student;
use Illuminate\Http\Request;

class TestDBController extends Controller
{
    public function addStudent()
    {
        $students = [
            ['name' => 'Aamer', 'email' => 'amir@ymail.com', 'phone' => '0504332211'],
            ['name' => 'Amna', 'email' => 'amna@ymail.com', 'phone' => '0504662244']
        ];
        Student::insert($students);
        return "Students are added";
    }

    public function addPaper()
    {
        $papers = [
            ['title' => 'Paper A4', 'body' => 'This is paper using A4'],
            ['title' => 'Paper A3', 'body' => 'This is paper using A3']
        ];
        Paper::insert($papers);
        return "Papers are created";
    }

    public function getStudents()
    {
        $students = Student::all();
        return $students;
    }

    public function getPapers()
    {
        $papers = Paper::all();
        return $papers;
    }
}
