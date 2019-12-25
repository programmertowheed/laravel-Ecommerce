@extends("backend.layouts.master")
@section("title")
Manage Product
@endsection
@section("content")

    <div class="content">
        <div class="page-inner">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">All Product</h4>
                                <a href="{{ route('add-product') }}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add new Product
                                </a>
                            </div>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Short Description</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Offer Price</th>
                                        <th>Upload By</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Short Description</th>
                                        <th>Brand</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Offer Price</th>
                                        <th>Upload By</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i = 1)
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        @if($product->image == NULL)
                                            <td><img height="50px" width="50px" src="{{ asset("/backend/product.png") }}" alt="Category Image"></td>
                                        @else
                                            <td><img height="50px" width="50px" src="{{ asset("/backend/product-image/") }}/{{ $product->image }}" alt="Category Image"></td>
                                        @endif
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->short_description }}</td>
                                        <td>{{ $product->brand_name }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->product_quantity }}</td>
                                        @if($product->offer_price == NULL)
                                        <td>Not set yet</td>
                                        @else
                                        <td>{{ $product->offer_price }}</td>
                                        @endif
                                        <td>{{ $product->username }}</td>

                                        <td>{{ $product->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        @if(Auth::user()->status == 1)
                                            <td>
                                                <div class="form-button-action">
                                                    @if($product->publication_status == 1)
                                                        <a href="{{ route('unpublished-product', ['id' => $product->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg pd0" data-original-title="Published">
                                                            <i class="fa fa-arrow-up"></i>
                                                        </a>

                                                    @else
                                                        <a href="{{ route('published-product', ['id' => $product->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg pd0" data-original-title="Unpublished">
                                                            <i class="fa fa-arrow-down"></i>
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('edit-product', ['id' => $product->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg pd0" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('delete-product', ['id' => $product->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger pd0" data-original-title="Remove">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        @elseif(Auth::user()->status == 0 && Auth::user()->id == $product->admin_id)
                                            <td>
                                                <div class="form-button-action">
                                                    @if($product->publication_status == 1)
                                                        <a href="{{ route('unpublished-product', ['id' => $product->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg pd0" data-original-title="Published">
                                                            <i class="fa fa-arrow-up"></i>
                                                        </a>

                                                    @else
                                                        <a href="{{ route('published-product', ['id' => $product->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg pd0" data-original-title="Unpublished">
                                                            <i class="fa fa-arrow-down"></i>
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('edit-product', ['id' => $product->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg pd0" data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('delete-product', ['id' => $product->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger pd0" data-original-title="Remove">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        @else
                                            <td>Not permit</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
