<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
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
        $main_category = Category::orderBy('category_name', 'desc')->where('parent_id', NULL)->get();
        return view('backend.category.add-category',['main_category' =>$main_category]);
    }

    public function manageCategory()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('backend.category.manage-category',['categories' => $categories]);
    }

    public function inputValidate($request)
    {
        $this->validate($request,[
            'category_name' => ['required', 'string', 'max:25'],
            'publication_status' => ['numeric'],
            'category_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'category_name.required' => 'Category name is required!!',
            'category_image.image' => 'Please select an image!!',
            'category_image.mimes' => 'Please select jpeg,png,jpg,gif,svg image!!',
            'category_image.max' => 'Image size is larger than 2MB!!',
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
            //$categoryImage->move($directory,$imageName);
            return $imageName;
    }

    public function saveCategory(Request $request)
    {
        $this->inputValidate($request);
        $category = new Category();

        if ( $request->hasFile('category_image')){
            if ($request->file('category_image')->isValid()) {
                $categoryImage = $request->file('category_image');// get the file
                $imageName = $this->uploadImage($categoryImage);
                $category->category_image = $imageName;
            }
        }

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->parent_id = $request->parent_id;
        $category->publication_status = $request->publication_status;
        $category->save();

        session()->flash('success', 'New Category Added');
        return redirect()->route("manage-category");
    }



    public function unpublishedCategory($id)
    {
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();

        session()->flash('success', 'Category info unpublished');
        return redirect()->route("manage-category");
    }

    public function publishedCategory($id)
    {
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();

        session()->flash('success', 'Category info Published');
        return redirect()->route("manage-category");
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        $category_list = Category::all();
        return view('backend.category.edit-category',['category' => $category, 'category_list' =>$category_list]);
    }

    public function categoryBasicInfo($category, $request, $imageName=NULL )
    {
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->parent_id = $request->parent_id;
        if($imageName){
            $category->category_image = $imageName;
        }
        $category->publication_status = $request->publication_status;
        $category->save();
    }

    public function updateCategory(Request $request)
    {
        //return $request->all();
        $this->inputValidate($request);
        $category = Category::find($request->category_id);

        if ( $request->hasFile('category_image')){
            if ($request->file('category_image')->isValid()) {
                if($category->category_image != NULL){
                    $path = public_path().'/backend/images/'.$category->category_image;
                    unlink($path);
                }
                $categoryImage = $request->file('category_image');// get the file
                $imageName = $this->uploadImage($categoryImage);
                $this->categoryBasicInfo($category,$request,$imageName);
                session()->flash('success', 'Category Updated Successfully');
                return redirect()->route("manage-category");
            }
        }else {

            $this->categoryBasicInfo($category,$request);
            session()->flash('success', 'Category Updated Successfully');
            return redirect()->route("manage-category");
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        session()->flash('success', 'Category deleted Successfully');
        return redirect()->route("manage-category");
    }


}
