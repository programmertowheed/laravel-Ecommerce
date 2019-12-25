<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
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
        return view('backend.brand.add-brand');
    }

    public function manageBrand()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.brand.manage-brand',['brands' => $brands]);
    }

    public function inputValidate($request)
    {
        $this->validate($request,[
            'brand_name' => ['required', 'string', 'max:25'],
            'publication_status' => ['numeric'],
            'brand_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'brand_name.required' => 'brand name is required!!',
            'brand_image.image' => 'Please select an image!!',
            'brand_image.mimes' => 'Please select jpeg,png,jpg,gif,svg image!!',
            'brand_image.max' => 'Image size is larger than 2MB!!',
        ]);
    }

    public function uploadImage($request)
    {
        $Image = $request;
        $fileType = $Image->getClientOriginalExtension();//file extention
        $imageName = time().'.'.$fileType;//file name
        $directory = 'backend/images/';//file directory
        $imageUrl = $directory.$imageName;//Image Url
        Image::make($Image)->resize(100,100)->save($imageUrl);
        //$brandImage->move($directory,$imageName);
        return $imageName;
    }

    public function saveBrand(Request $request)
    {
        $this->inputValidate($request);
        $brand = new Brand();

        if ( $request->hasFile('brand_image')){
            if ($request->file('brand_image')->isValid()) {
                $brandImage = $request->file('brand_image');// get the file
                $imageName = $this->uploadImage($brandImage);
                $brand->brand_image = $imageName;
            }
        }

        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();

        session()->flash('success', 'New brand Added');
        return redirect()->route("manage-brand");
    }



    public function unpublishedBrand($id)
    {
        $brand = Brand::find($id);
        $brand->publication_status = 0;
        $brand->save();

        session()->flash('success', 'brand info unpublished');
        return redirect()->route("manage-brand");
    }

    public function publishedBrand($id)
    {
        $brand = Brand::find($id);
        $brand->publication_status = 1;
        $brand->save();

        session()->flash('success', 'brand info Published');
        return redirect()->route("manage-brand");
    }

    public function editBrand($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.edit-brand',['brand' => $brand]);
    }

    public function brandBasicInfo($brand, $request, $imageName=NULL )
    {
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        if($imageName){
            $brand->brand_image = $imageName;
        }
        $brand->publication_status = $request->publication_status;
        $brand->save();
    }

    public function updateBrand(Request $request)
    {
        //return $request->all();
        $this->inputValidate($request);
        $brand = Brand::find($request->brand_id);

        if ( $request->hasFile('brand_image')){
            if ($request->file('brand_image')->isValid()) {
                if($brand->brand_image != NULL){
                    $path = public_path().'/backend/images/'.$brand->brand_image;
                    unlink($path);
                }
                $brandImage = $request->file('brand_image');// get the file
                $imageName = $this->uploadImage($brandImage);
                $this->brandBasicInfo($brand,$request,$imageName);
                session()->flash('success', 'brand Updated Successfully');
                return redirect()->route("manage-brand");
            }
        }else {

            $this->brandBasicInfo($brand,$request);
            session()->flash('success', 'brand Updated Successfully');
            return redirect()->route("manage-brand");
        }
    }

    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        session()->flash('success', 'brand deleted Successfully');
        return redirect()->route("manage-brand");
    }
}
