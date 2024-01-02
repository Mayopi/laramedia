@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item">Post</li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Buat Post
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="post-title" class="form-label">Judul Postingan</label>
                  <input type="text" class="form-control" id="post-title" aria-describedby="emailHelp" name="name">
                  <div id="emailHelp" class="form-text">Buat semenarik mungkin</div>
                </div>
                <div class="mb-3">
                  <label for="caption" class="form-label">Caption</label>
                  <textarea type="text" class="form-control" id="caption" name="caption"></textarea>
                </div>
                <div class="mb-3">
                  <label for="File" class="form-label">Gambar Postingan</label>
                  <input type="file" class="form-control" id="File" accept="jpg,jpeg,image/png,image/jpeg" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
</div>
@endsection