@extends("backend.layouts.master")
@section("title")
Add District
@endsection
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4 class="text-center text-success">Add District</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('new-district') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="district_name" class="col-md-4 col-form-label text-md-right">District Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="district_name">

                                    @if($errors->has('district_name'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('district_name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="division_id" class="col-md-4 col-form-label text-md-right">Division name</label>

                                <div class="col-md-8">
                                    <select name="division_id" class="form-control" >
                                        <option value="">Select division name</option>
                                        @foreach($division_list as $division)
                                            <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('division_id'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('division_id') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="publication_status" class="col-md-4 col-form-label text-md-right">Publication status</label>

                                <div class="col-md-8">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1"><input class="form-check-input" id="inlineRadio1" type="radio" name="publication_status" checked value="1">Published</label>
                                        <label class="form-check-label" for="inlineRadio2"><input class="form-check-input" id="inlineRadio2" type="radio" name="publication_status" value="0">Unpublished</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Save District Info') }}
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
