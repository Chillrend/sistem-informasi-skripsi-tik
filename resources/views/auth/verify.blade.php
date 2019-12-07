@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi email dibutuhkan.') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Email verifikasi telah dikirim.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, Silahkan cek e-mail Anda untuk verifikasi Email') }}
                    {{ __('Jika Anda tidak menerima email apapun') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik disini untuk mengirim ulang') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
