@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Posts</a></li>
          <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
      </nav>

      <div class="card">
        <div class="card-header">
          Update Post
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('post.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="post-title" class="form-label">Judul Postingan</label>
                  <input type="text" class="form-control" id="post-title" aria-describedby="emailHelp" name="name" value="{{ $post->name }}">
                  <div id="emailHelp" class="form-text">Buat semenarik mungkin</div>
                </div>
                <div class="mb-3">
                  <label for="caption" class="form-label">Caption</label>
                  <textarea type="text" class="form-control" id="caption" name="caption">{{ $post->caption }}</textarea>
                </div>
                <div class="mb-3">
                  <label for="File" class="form-label">Gambar Postingan <span class="text-danger">(Jangan isi jika tidak ingin mengubah gambar)</span></label>
                  <input type="file" class="form-control" id="File" accept="jpg,jpeg,image/png,image/jpeg" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
      </div>
</div>
@endsection