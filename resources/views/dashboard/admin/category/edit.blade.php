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
                <form method="post" action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Category</label>
                        <x-forms.input name="name" id="name" type="text" value="{{ old('name', $category->name) }}"
                            placeholder="Nama Category" attribute="required" />
                    </div>
                    {{-- <div class="mb-3">
                        <label for="slug" class="form-label">Slug Category</label>
                        <x-forms.input name="slug" id="slug" type="text" value="{{ old('slug', $category->slug) }}"
                            placeholder="Slug Category" attribute="required" />
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </form>
            </table>
        </div>
      </main>
  </div>
</div>
@endsection
