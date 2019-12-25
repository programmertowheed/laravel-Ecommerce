@extends("backend.layouts.master")
@section("title")
Edit Division
@endsection
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4 class="text-center text-success">Edit Division</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-division') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="division_name" class="col-md-4 col-form-label text-md-right">Division Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{ $division->division_name }}" name="division_name">
                                    <input type="hidden" class="form-control" value="{{ $division->id }}" name="division_id">

                                    @if($errors->has('division_name'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('division_name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="division_priority" class="col-md-4 col-form-label text-md-right">Division Priority</label>

                                <div class="col-md-8">
                                    <input type="number" name="division_priority" class="form-control" value="{{ $division->division_priority }}" />

                                    @if($errors->has('division_priority'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('division_priority') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Publication status</label>

                                <div class="col-md-8">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1"><input class="form-check-input" id="inlineRadio1" type="radio" name="publication_status" {{ $division->publication_status ==1 ? 'checked' : ''}} value="1">Published</label>
                                        <label class="form-check-label" for="inlineRadio2"><input class="form-check-input" id="inlineRadio2" type="radio" name="publication_status" {{ $division->publication_status ==0 ? 'checked' : ''}} value="0">Unpublished</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update Division Info') }}
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
