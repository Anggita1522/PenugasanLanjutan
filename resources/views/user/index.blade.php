@extends('layouts.user.user')

@section('content')
    <div class="container mt-5">
        <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p>Anda sedang berada di halaman User Dashboard.</p>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Informasi</h5>
                <p class="card-text">Gunakan dashboard ini untuk melihat data Anda.</p>
            </div>
        </div>
    </div>
@endsection
