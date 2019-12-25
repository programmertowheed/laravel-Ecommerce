<?php

namespace App\Http\Controllers\Backend;

use App\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.division.add-division');
    }

    public function manageDivision()
    {
        $divisions = Division::orderBy('division_priority', 'asc')->get();
        return view('backend.division.manage-division',['divisions' => $divisions]);
    }

    public function inputValidate($request)
    {
        $this->validate($request,[
            'division_name' => ['required', 'string', 'max:15'],
            'publication_status' => 'numeric',
            'division_priority' => ['required','numeric'],
        ],[
            'division_name.required' => 'Division name is required!!',
            'division_priority.required' => 'Division priority is required!!',
            'division_priority.numeric' => 'Division priority must be number!!',
        ]);
    }



    public function saveDivision(Request $request)
    {
        $this->inputValidate($request);
        $division = new Division();
        $this->divisionBasicInfo($division,$request);

        session()->flash('success', 'New Division Added');
        return redirect()->route("manage-division");
    }



    public function unpublishedDivision($id)
    {
        $division = Division::find($id);
        $division->publication_status = 0;
        $division->save();

        session()->flash('success', 'Division info unpublished');
        return redirect()->route("manage-division");
    }

    public function publishedDivision($id)
    {
        $division = Division::find($id);
        $division->publication_status = 1;
        $division->save();

        session()->flash('success', 'Division info Published');
        return redirect()->route("manage-division");
    }

    public function editDivision($id)
    {
        $division = Division::find($id);
        return view('backend.division.edit-division',['division' => $division]);
    }

    public function divisionBasicInfo($division, $request )
    {
        $division->division_name = $request->division_name;
        $division->division_priority = $request->division_priority;
        $division->publication_status = $request->publication_status;
        $division->save();
    }

    public function updateDivision(Request $request)
    {
        //return $request->all();
        $this->inputValidate($request);
        $division = Division::find($request->division_id);
        $this->divisionBasicInfo($division,$request);
        session()->flash('success', 'Division Updated Successfully');
        return redirect()->route("manage-division");

    }

    public function deleteDivision($id)
    {
        $division = Division::find($id);
        $division->delete();

        session()->flash('success', 'Division deleted Successfully');
        return redirect()->route("manage-division");
    }
}
