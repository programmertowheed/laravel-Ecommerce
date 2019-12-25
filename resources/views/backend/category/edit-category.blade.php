@extends("backend.layouts.master")
@section("title")
Edit Category
@endsection
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4 class="text-center text-success">Edit Category</h4></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-category') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="category_name" class="col-md-4 col-form-label text-md-right">Category Name</label>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{ $category->category_name }}" name="category_name">
                                    <input type="hidden" class="form-control" value="{{ $category->id }}" name="category_id">

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
                                    <textarea name="category_description" class="form-control" cols="30" rows="2">{{ $category->category_description }}</textarea>

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
                                        <option value="">Select parent Category</option>
                                        @foreach($category_list as $catlist)
                                            <option {{ $catlist->id == $category->parent_id ? 'selected' : ''}} value="{{ $catlist->id }}">{{ $catlist->category_name }}</option>
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
                                <label class="col-md-4 col-form-label text-md-right"></label>

                                <div class="col-md-8">
                                    @if($category->category_image == NULL)
                                        <p class="text-info mt-1 mb-0">Category image not selected yet!!</p>
                                    @else
                                        <img height="50px" width="50px" src="{{ asset("/backend/images/") }}/{{ $category->category_image }}" alt="Category Image">
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Publication status</label>

                                <div class="col-md-8">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label" for="inlineRadio1"><input class="form-check-input" id="inlineRadio1" type="radio" name="publication_status" {{ $category->publication_status ==1 ? 'checked' : ''}} value="1">Published</label>
                                        <label class="form-check-label" for="inlineRadio2"><input class="form-check-input" id="inlineRadio2" type="radio" name="publication_status" {{ $category->publication_status ==0 ? 'checked' : ''}} value="0">Unpublished</label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update Category Info') }}
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
