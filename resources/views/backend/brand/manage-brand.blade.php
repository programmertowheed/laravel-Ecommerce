@extends("backend.layouts.master")
@section("title")
Manage Brand
@endsection
@section("content")

    <div class="content">
        <div class="page-inner">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">All Brand</h4>
                                <a href="{{ route('add-brand') }}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add new brand
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i = 1)
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        @if($brand->brand_image == NULL)
                                            <td><img height="50px" width="50px" src="{{ asset("/backend/images/brand.jpg") }}" alt="Brand Image"></td>
                                        @else
                                            <td><img height="50px" width="50px" src="{{ asset("/backend/images/") }}/{{ $brand->brand_image }}" alt="Brand Image"></td>
                                        @endif
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>{{ $brand->brand_description }}</td>
                                        <td>{{ $brand->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                @if($brand->publication_status == 1)
                                                    <a href="{{ route('unpublished-brand', ['id' => $brand->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg pd0" data-original-title="Published">
                                                        <i class="fa fa-arrow-up"></i>
                                                    </a>

                                                @else
                                                    <a href="{{ route('published-brand', ['id' => $brand->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg pd0" data-original-title="Unpublished">
                                                        <i class="fa fa-arrow-down"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('edit-brand', ['id' => $brand->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg pd0" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete-brand', ['id' => $brand->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger pd0" data-original-title="Remove">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
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
