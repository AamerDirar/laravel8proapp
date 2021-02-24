<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function index()
    {
        $supervisors = Supervisor::orderby('id', 'DESC')->get();
        return view('supervisors', compact('supervisors'));
    }

    public function addSupervisor(Request $request)
    {
        $supervisor = new Supervisor();
        $supervisor->firstname = $request->firstname;
        $supervisor->lastname = $request->lastname;
        $supervisor->email = $request->email;
        $supervisor->phone = $request->phone;
        $supervisor->save();
        return response()->json($supervisor);
    }

    public function getSupervisorById($id)
    {
        $supervisor = Supervisor::find($id);
        return response()->json($supervisor);
    }

    public function updateSupervisor(Request $request)
    {
        $supervisor = Supervisor::find($request->id);
        $supervisor->firstname = $request->firstname;
        $supervisor->lastname = $request->lastname;
        $supervisor->email = $request->email;
        $supervisor->phone = $request->phone;
        $supervisor->save();
        return response()->json($supervisor);
    }

    public function deleteSupervisor($id)
    {
        $supervisor = Supervisor::find($id);
        $supervisor->delete();
        return response()->json(['success' => 'Record has been deleted successfully!']);
    }

    public function deleteCheckedSupervisors(Request $request)
    {
        $ids = $request->ids;
        Supervisor::where('id',$ids)->delete();
        return response()->json(['success' => "Supervisors has been deleted successfully!"]);
    }
}
