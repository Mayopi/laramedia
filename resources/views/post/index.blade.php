@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Posts</li>
        </ol>
    </nav>


    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="ratio ratio-4x3" style="background-image: url('{{ url($post->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">{{ $post->name }}</h3>
                            <p class="text-body-secondary">{{ $post->caption }}</p>

                            <p>Diposting pada tanggal {{ \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('j F, Y') }} Oleh {{ $user->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
            
</div>
@endsection