@extends("backend.layouts.master")
@section("title")
Manage Division
@endsection
@section("content")

    <div class="content">
        <div class="page-inner">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">All Division</h4>
                                <a href="{{ route('add-division') }}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add new Division
                                </a>
                            </div>
                        </div>
                        <div class="card-body">


                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @php($i = 1)
                                    @foreach($divisions as $division)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $division->division_name }}</td>
                                        <td>{{ $division->division_priority }}</td>
                                        <td>{{ $division->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
                                        <td>
                                            <div class="form-button-action">
                                                @if($division->publication_status == 1)
                                                    <a href="{{ route('unpublished-division', ['id' => $division->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-info btn-lg pd0" data-original-title="Published">
                                                        <i class="fa fa-arrow-up"></i>
                                                    </a>

                                                @else
                                                    <a href="{{ route('published-division', ['id' => $division->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning btn-lg pd0" data-original-title="Unpublished">
                                                        <i class="fa fa-arrow-down"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('edit-division', ['id' => $division->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg pd0" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('delete-division', ['id' => $division->id]) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger pd0" data-original-title="Remove">
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
