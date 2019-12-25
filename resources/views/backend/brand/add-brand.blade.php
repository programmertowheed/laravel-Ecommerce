@extends("backend.layouts.master")
@section("title")
Add Brand
@endsection
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4 class="text-center text-success">Add Brand</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('new-brand') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="brand_name" class="col-md-4 col-form-label text-md-right">Brand Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="brand_name">

                                    @if($errors->has('brand_name'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('brand_name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brand_description" class="col-md-4 col-form-label text-md-right">Brand Description</label>

                                <div class="col-md-8">
                                    <textarea name="brand_description" class="form-control" cols="30" rows="2"></textarea>

                                    @if($errors->has('brand_description'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('brand_description') }}
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="brand_image" class="col-md-4 col-form-label text-md-right">Brand Image</label>

                                <div class="col-md-8">
                                    <input type="file" name="brand_image">
                                    <p class="text-warning mt-1 mb-0">[Note: Selected image size must be lower than 2 MB]</p>
                                    @if($errors->has('brand_image'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('brand_image') }}
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
                                        {{ __('Save Brand Info') }}
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
