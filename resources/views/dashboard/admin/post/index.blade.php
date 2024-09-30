@extends('layouts.dashboard')

@section('dashboard')
<div class="container-fluid">
  <div class="row">
    @include('partials.sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">{{ $title }}</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <a type="button" href="{{ route('post.create') }}" class="btn btn-sm btn-outline-secondary">Create Post</a>
            </div>
            <form class="d-flex"  action="{{ route('post.index') }}" role="search">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-secondary" type="submit">Search</button>
              </form>
          </div>
        </div>

        <h2>Section Dashboard</h2>
        <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Descrpition</th>
              </tr>
            </thead>
            @foreach ($list as $post)
            <tbody>
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->description }}</td>

                <td><a href="{{ route('post.edit',$post->id) }}"
                    class="badge bg-warning"><i class="bi bi-pencil-square"></i></a></td>
                    <form action="{{ route('post.destroy',$post->id) }}" method="post"
                        class="d-inline">
                        @method('delete')
                        @csrf
                        <td>
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Hapus Data Ini?')"><i
                                    class="bi bi-x-circle"></i></button>
                        </td>
                    </form>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $list->links() }}
        </div>
      </main>
  </div>
</div>

@endsection

