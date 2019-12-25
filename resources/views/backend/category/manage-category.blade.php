@extends("backend.layouts.master")
@section("title")
Manage Category
@endsection
@section("content")

    <div class="content">
        <div class="page-inner">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">All Category</h4>
                                <a href="{{ route('add-category') }}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add new category
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
                                        <th>Parent</th>
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
                                        <th>Parent</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i = 1)
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        @if($category->category_image == NULL)
                                            <td><img height="50px" width="50px" src="{{ asset("/backend/images/cat.jpg") }}" alt="Category Image"></td>
                                        @else
                                            <td><img height="50px" width="50px" src="{{ asset("/backend/images/") }}/{{ $category->category_image }}" alt="Category Image"></td>
                                        @endif
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->category_description }}</td>
                                        @if($category->parent_id == NULL)
                                            <td>Primary Category</td>
                                        @else
                                            <td>{{ $category->parent->category_name }}</td>
                                        @endif

                                        <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                @if($category->publication_status == 1)
                                                    <a href="{{ route('unpublished-category', ['id' => $category->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg pd0" data-original-title="Published">
                                                        <i class="fa fa-arrow-up"></i>
                                                    </a>

                                                @else
                                                    <a href="{{ route('published-category', ['id' => $category->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg pd0" data-original-title="Unpublished">
                                                        <i class="fa fa-arrow-down"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('edit-category', ['id' => $category->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg pd0" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete-category', ['id' => $category->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger pd0" data-original-title="Remove">
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
