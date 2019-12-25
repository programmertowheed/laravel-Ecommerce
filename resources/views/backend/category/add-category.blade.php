@extends("backend.layouts.master")
@section("title")
Add Category
@endsection
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4 class="text-center text-success">Add Category</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('new-category') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="category_name" class="col-md-4 col-form-label text-md-right">Category Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="category_name">

                                    @if($errors->has('category_name'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('category_name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_description" class="col-md-4 col-form-label text-md-right">Category Description</label>

                                <div class="col-md-8">
                                    <textarea name="category_description" class="form-control" cols="30" rows="2"></textarea>

                                    @if($errors->has('category_description'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('category_description') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="parent_id" class="col-md-4 col-form-label text-md-right">Parent Category</label>

                                <div class="col-md-8">
                                    <select name="parent_id" class="form-control" >
                                        <option value="">Select Parent Category</option>
                                        @foreach($main_category as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('parent_id'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('parent_id') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_image" class="col-md-4 col-form-label text-md-right">Category Image</label>

                                <div class="col-md-8">
                                    <input type="file" name="category_image">
                                    <p class="text-warning mt-1 mb-0">[Note: Selected image size must be lower than 2 MB]</p>
                                    @if($errors->has('category_image'))
                                        <span style='color:red;font-size:16px;display:block'>
                                                {{ $errors->first('category_image') }}
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
                                        {{ __('Save Category Info') }}
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
