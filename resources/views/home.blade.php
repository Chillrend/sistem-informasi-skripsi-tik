@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <h1 style="text-align: center"> Selamat datang di sistem pengajuan proposal skripsi TIK</h1>
        </div>
    </div>
</div>
@endsection
