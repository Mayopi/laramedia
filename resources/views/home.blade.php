@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p>Selamat Datang {{ \Auth::user()->name }}</p>
                </div>

                <div class="card-body">
                    <h3>Mulai Buat Postingan Anda</h3>
                    <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Buat Postingan</a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    
    <div class="row justify-content-center mt-3">
        <h3 class="text-center">Statistik</h3>
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Total Postingan Anda</h5>
                      <div class="row">
                        <div class="col">
                          <h2 class="d-flex justify-content-between" id="total-post">{{ Auth::user()->posts()->count() }}</h2>
                        </div>
                        <div class="col">
                          <h2>
                            <i class="bi bi-postcard-heart"></i>
                          </h2>
                        </div>
                      </div>
                      <p class="card-text text-body-tertiary">Statistik jumlah postingan yang telah anda posting</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Lihat Postingan Anda</h5>
                      <p class="card-text text-body-tertiary">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="{{ route('post.index') }}" class="btn btn-primary">Lihat</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

<script>
  const totalPostElement = document.querySelector('#total-post')
  const totalPost = totalPostElement.textContent
  const formattedTotalPost = new Intl.NumberFormat('id-ID', {
    maximumSignificantDigits: 3,
  }).format(totalPost);

  totalPostElement.textContent = formattedTotalPost;

</script>
@endsection
