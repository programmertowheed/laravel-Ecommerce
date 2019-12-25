<?php

namespace App\Http\Controllers\Backend;

use App\District;
use App\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DistrictController extends Controller
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
        $division_list = Division::orderBy('division_priority', 'asc')->get();
        return view('backend.district.add-district', ['division_list' =>$division_list]);
    }

    public function manageDistrict()
    {
        $districts = DB::table('districts')
                    ->join('divisions', 'districts.division_id', '=', 'divisions.id')
                    ->select('districts.*', 'divisions.division_name')
                    ->orderBy('district_name', 'asc')
                    ->get();

        return view('backend.district.manage-district',['districts' => $districts]);
    }

    public function inputValidate($request)
    {
        $this->validate($request,[
            'district_name' => ['required', 'string', 'max:15'],
            'publication_status' => 'numeric',
            'division_id' => ['required'],
        ],[
            'district_name.required' => 'District name is required!!',
            'division_id.required' => 'Division name is required!!',
        ]);
    }



    public function saveDistrict(Request $request)
    {
        $this->inputValidate($request);
        $district = new District();
        $this->districtBasicInfo($district,$request);

        session()->flash('success', 'New District Added');
        return redirect()->route("manage-district");
    }



    public function unpublishedDistrict($id)
    {
        $district = District::find($id);
        $district->publication_status = 0;
        $district->save();

        session()->flash('success', 'District info unpublished');
        return redirect()->route("manage-district");
    }

    public function publishedDistrict($id)
    {
        $district = District::find($id);
        $district->publication_status = 1;
        $district->save();

        session()->flash('success', 'District info Published');
        return redirect()->route("manage-district");
    }

    public function editDistrict($id)
    {
        $district = District::find($id);
        $division_list = Division::all();
        return view('backend.district.edit-district',['district' => $district, 'division_list' => $division_list]);
    }

    public function districtBasicInfo($district, $request )
    {
        $district->district_name = $request->district_name;
        $district->division_id = $request->division_id;
        $district->publication_status = $request->publication_status;
        $district->save();
    }

    public function updateDistrict(Request $request)
    {
        //return $request->all();
        $this->inputValidate($request);
        $district = District::find($request->district_id);
        $this->districtBasicInfo($district,$request);
        session()->flash('success', 'District Updated Successfully');
        return redirect()->route("manage-district");

    }

    public function deleteDistrict($id)
    {
        $district = District::find($id);
        $district->delete();

        session()->flash('success', 'District deleted Successfully');
        return redirect()->route("manage-district");
    }
}
