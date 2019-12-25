<?php

namespace App\Http\Controllers\Backend;

use App\Product;
use App\Category;
use App\Brand;
use App\ProductImage;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
        $categories = Category::orderBy('category_name', 'desc')
                     ->where('publication_status',1)
                     ->get();

        $brands     = Brand::orderBy('brand_name', 'desc')
                     ->where('publication_status',1)
                     ->get();

        return view('backend.Product.add-Product',[
            'categories' =>$categories,
            'brands' =>$brands
        ]);

    }

    public function manageProduct()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('admins', 'products.admin_id', '=', 'admins.id')
            ->leftJoin('product_images', function ($join) {
                $join->on('product_images.id', '=', DB::raw('(SELECT id FROM product_images WHERE product_images.product_id = products.id LIMIT 1)'));
            })
            ->select('products.*', 'categories.category_name', 'brands.brand_name', 'admins.username', 'product_images.image')
            ->orderBy('products.id', 'desc')
            ->get();
        return view('backend.Product.manage-product',['products' => $products]);
    }

    public function inputValidate($request)
    {
        $this->validate($request,[
            'product_name'        => ['required', 'string', 'max:50'],
            'short_description'   => ['required', 'string'],
            'long_description'    => ['required', 'string'],
            'category_id'         => ['required', 'numeric'],
            'brand_id'            => ['required', 'numeric'],
            'offer_price'         => 'min:0',
            'product_price'       => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|min:0',
            'product_quantity'    => 'required|integer|min:0',
            'publication_status'  => 'numeric',
            'product_image.*'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],[
            'product_name.required'       => 'Product name is required!!',
            'product_name.max'            => 'Product name field is too long!!',
            'short_description.required'      => 'Product short description is required!!',
            'long_description.required'      => 'Product long description is required!!',
            'category_id.required'      => 'Please select a Category!!',
            'category_id.numeric'      => 'Category field must be a numeric value!!',
            'brand_id.required'      => 'Please select a Brand!!',
            'brand_id.numeric'      => 'Brand field must be a numeric value!!',
            'offer_price.min'      => 'Offer price must be at least 0!!',
            'product_price.required'      => 'Product price is required!!',
            'product_price.regex'      => 'Product price must be a numeric value!!',
            'product_price.min'      => 'Product price must be at least 0!!',
            'product_quantity.required'      => 'Product quantity is required!!',
            'product_quantity.integer'      => 'Product quantity must be a numeric value!!',
            'product_quantity.min'      => 'Product quantity must be at least 0!!',
            'product_image.image' => 'Please select an image!!',
            'product_image.mimes' => 'Please select jpeg,png,jpg,gif,svg image!!',
            'product_image.max' => 'Image size is larger than 2MB!!',
        ]);
    }

    public function uploadImage($request)
    {
        $Image = $request;
        $fileType = $Image->getClientOriginalExtension();//file extention
        $num = rand(1000000, 9999999);
        $imageName = $num.time().'.'.$fileType;//file name
        $directory = 'backend/product-image/';//file directory
        $imageUrl = $directory.$imageName;//Image Url
        Image::make($Image)->resize(100,100)->save($imageUrl);
        //$ProductImage->move($directory,$imageName);
        return $imageName;
    }

    public function saveProduct(Request $request)
    {
        $this->inputValidate($request);
        $Product = new Product();

        $Product->product_name = $request->product_name;
        $Product->short_description = $request->short_description;
        $Product->long_description = $request->long_description;
        $Product->category_id = $request->category_id;
        $Product->brand_id = $request->brand_id;
        $Product->product_slug = str_slug($request->product_name);
        $Product->product_quantity = $request->product_quantity;
        $Product->product_price = $request->product_price;
        $Product->offer_price = $request->offer_price;
        $Product->product_quantity = $request->product_quantity;

        $id = Auth::user()->id;
        $Product->admin_id = $id;
        $Product->publication_status = $request->publication_status;
        $Product->save();

        if ( $request->hasFile('product_image')){
            foreach ($request->file('product_image') as $ProductImage) {
               // $ProductImage = $request->file('product_image');// get the file
                $imageName = $this->uploadImage($ProductImage);

                $product_image = new ProductImage();
                $product_image->product_id = $Product->id;
                $product_image->image = $imageName;
                $product_image->save();
            }
        }


        session()->flash('success', 'New Product Added');
        return redirect()->route("manage-product");
    }



    public function unpublishedProduct($id)
    {
        $Product = Product::find($id);
        $Product->publication_status = 0;
        $Product->save();

        session()->flash('success', 'Product info unpublished');
        return redirect()->route("manage-product");
    }

    public function publishedProduct($id)
    {
        $Product = Product::find($id);
        $Product->publication_status = 1;
        $Product->save();

        session()->flash('success', 'Product info Published');
        return redirect()->route("manage-product");
    }

    public function editProduct($id)
    {
        $product    = Product::find($id);
        $categories = Category::all();
        $brands     = Brand::all();
        $images     = array();
        $images     = ProductImage::where('product_id', $id)->get();
        return view('backend.Product.edit-product',[
            'product' => $product,
            'categories' =>$categories,
            'brands' =>$brands,
            'images' =>$images
        ]);
    }

    public function ProductBasicInfo($Product, $request)
    {
        $Product->product_name = $request->product_name;
        $Product->short_description = $request->short_description;
        $Product->long_description = $request->long_description;
        $Product->category_id = $request->category_id;
        $Product->brand_id = $request->brand_id;
        $Product->product_slug = str_slug($request->product_name);
        $Product->product_quantity = $request->product_quantity;
        $Product->product_price = $request->product_price;
        $Product->offer_price = $request->offer_price;
        $Product->product_quantity = $request->product_quantity;

        $id = Auth::user()->id;
        $Product->admin_id = $id;
        $Product->publication_status = $request->publication_status;
        $Product->save();
    }

    public function updateProduct(Request $request)
    {
        //return $request->all();
        $this->inputValidate($request);
        $Product = Product::find($request->product_id);



        if ( $request->hasFile('product_image')){
            //$images = ProductImage::find('product_id', $Product->id);
            //return $images->image;

            /*foreach ($request->file('product_image') as $ProductImage) {
                if($images->image != NULL){
                    $path = public_path().'/backend/images/'.$images->image;
                    unlink($path);
                }

                //$ProductImage = $request->file('Product_image');// get the file
                $imageName = $this->uploadImage($ProductImage);
                $images->image = $imageName;
                $images->save();

            }*/

            $this->ProductBasicInfo($Product,$request);
            session()->flash('success', 'Product Updated Successfully');
            return redirect()->route("manage-product");
        }else {

            $this->ProductBasicInfo($Product,$request);
            session()->flash('success', 'Product Updated Successfully');
            return redirect()->route("manage-product");
        }
    }

    public function deleteProduct($id)
    {
        $Product = Product::find($id);
        $Product->delete();

        session()->flash('success', 'Product deleted Successfully');
        return redirect()->route("manage-product");
    }
}
