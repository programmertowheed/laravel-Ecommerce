@extends("backend.layouts.master")
@section("title")
Edit Product
@endsection
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h4 class="text-center text-success">Edit Product info</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-product') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="product_name" class="col-md-4 col-form-label text-md-right">Product Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
                                    <input type="hidden" class="form-control" value="{{ $product->id }}" name="product_id">

                                    @if($errors->has('product_name'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('product_name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="short_description" class="col-md-4 col-form-label text-md-right">Short Description</label>

                                <div class="col-md-8">
                                    <textarea name="short_description" class="form-control" cols="30" rows="2">{{ $product->short_description }}</textarea>

                                    @if($errors->has('short_description'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('short_description') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="long_description" class="col-md-4 col-form-label text-md-right">Long Description</label>

                                <div class="col-md-8" style="margin-top: 18px;">
                                    <textarea name="long_description" id="editor" class="form-control" cols="30" rows="5">{{ $product->long_description }}</textarea>

                                    @if($errors->has('long_description'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('long_description') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_price" class="col-md-4 col-form-label text-md-right">Product Price</label>

                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="product_price" value="{{ $product->product_price }}">

                                    @if($errors->has('product_price'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('product_price') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="offer_price" class="col-md-4 col-form-label text-md-right">Offer Price</label>

                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="offer_price" value="{{ $product->offer_price }}">

                                    @if($errors->has('offer_price'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('offer_price') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_quantity" class="col-md-4 col-form-label text-md-right">Product Quantity</label>

                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="product_quantity" value="{{ $product->product_quantity }}">

                                    @if($errors->has('product_quantity'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('product_quantity') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brand_id" class="col-md-4 col-form-label text-md-right">Brand Name</label>

                                <div class="col-md-8">
                                    <select name="brand_id" class="form-control" >
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{( $product->brand_id == $brand->id)? 'selected':''}}>{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('brand_id'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('brand_id') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">Category Name</label>

                                <div class="col-md-8">
                                    <select name="category_id" class="form-control" >
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{( $product->category_id == $category->id)? 'selected':''}}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('category_id'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('category_id') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="product_image" class="col-md-4 col-form-label text-md-right">Product Image</label>

                                <div class="col-md-8">
                                    <input type="file" style="padding: 5px 0" name="product_image[]">
                                    <input type="file" style="padding: 5px 0" name="product_image[]">
                                    <input type="file" style="padding: 5px 0" name="product_image[]">
                                    <p class="text-warning mt-1 mb-0">[Note: Selected image size must be lower than 2 MB]</p>
                                    @if($errors->has('product_image'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('product_image') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"></label>

                                <div class="col-md-8">
                                    @if(count($images) <=0)
                                        <p class="text-info mt-1 mb-0">Category image not selected yet!!</p>
                                    @else
                                        @foreach($images as $image)
                                            <img height="50px" width="50px" style="margin: 5px;" src="{{ asset("/backend/product-image/") }}/{{ $image->image }}" alt="Category Image">
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="publication_status" class="col-md-4 col-form-label text-md-right">Publication Status</label>

                                <div class="col-md-8">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1"><input class="form-check-input" id="inlineRadio1" type="radio" name="publication_status" {{ $product->publication_status ==1 ? 'checked' : ''}} value="1">Published</label>
                                        <label class="form-check-label" for="inlineRadio2"><input class="form-check-input" id="inlineRadio2" type="radio" name="publication_status" {{ $product->publication_status ==0 ? 'checked' : ''}} value="0">Unpublished</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update Product Info') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
