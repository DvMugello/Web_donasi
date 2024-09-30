@extends('layouts.dashboard')

@section('dashboard')

<div class="container-fluid">
  <div class="row">
    @include('partials.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">{{ $title }}</h1>
        </div>

        <h2>{{ $subteks }}</h2>
        <div class="table-responsive small">
            <table class="table table-striped table-sm">
                <form method="post" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Post</label>
                        <x-forms.input name="name" id="name" type="text" value="{{ old('name', $post->name) }}"
                            placeholder="Nama Post" attribute="required" />
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug Category</label>
                        <x-forms.input name="slug" id="slug" type="text" value="{{ old('slug', $post->slug) }}"
                            placeholder="Slug Category" attribute="required" />
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category_id" class="form-select">
                            @foreach ($categories as $category)
                                @if (old('category_id') == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Photo Post</label>
                        <x-forms.input name="photo" id="photo" type="file" class="dropify"
                            data-default-file="url_of_your_file" value="{{ old('photo', $post->photo) }}"
                            placeholder="Photo Post" attribute="required" />
                    </div>
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </form>
            </table>
        </div>
      </main>
  </div>
</div>
@endsection
