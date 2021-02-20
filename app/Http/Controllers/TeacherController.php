<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function addTeacher()
    {
        return view('add-teacher');
    }

    public function storeTeacher(Request $request)
    {
        $name      = $request->name;
        $image     = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $teacher               = new Teacher();
        $teacher->name         = $name;
        $teacher->profileimage = $imageName;
        $teacher->save();
        return back()->with('teacher_added', 'Teacher record has been inserted successfully');
    }

    public function teachers()
    {
        $teachers = Teacher::all();
        return view('all-teachers', compact('teachers'));
    }

    public function editTeacher($id)
    {
        $teacher = Teacher::find($id);
        return view('edit-teacher', compact('teacher'));
    }

    public function updateTeacher(Request $request)
    {
        $name      = $request->name;
        $image     = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $teacher = Teacher::find($request->id);
        $teacher->name = $name;
        $teacher->profileimage = $imageName;
        $teacher->save();
        return back()->with('teacher_updated', 'Teacher record has been updated successfully!');
    }

    public function deleteTeacher($id)
    {
        $teacher = Teacher::find($id);
        unlink(public_path('images').'/'.$teacher->profileimage);
        $teacher->delete();
        return back()->with('teacher_deleted', 'Teacher record has been deleted successfully!');

    }
}
