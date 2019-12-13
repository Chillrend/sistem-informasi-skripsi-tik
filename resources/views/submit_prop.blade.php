@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pengajuan Proposal</div>

                    <div class="card-body">
                        <form method="POST" action="/gogo">
                            @csrf
                            <div class="form-group">
                                <label for="judul_skripsi">Judul Skripsi</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul_skripsi" placeholder="Judul...">

                                @error('judul')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <small id="emailHelp" class="form-text text-muted">Pikirkan baik-baik judul skripsi saudara, supaya diterima dosbing hehe</small>

                            </div>

                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="description" placeholder="Deskripsi">

                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="dosbing">Dosen pembimbing</label>
                                <select id="dosbing" class="pembimbing form-control @error('pembimbing') is-invalid @enderror" style="width:500px;" name="pembimbing"></select>

                                @error('pembimbing')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <small class="form-text text-muted">Silahkan pilih yang gampang nge-acc proposal</small>

                            </div>

                            <div class="form-group">
                                <label for="abstrak">Abstrak</label>
                                <textarea class="form-control @error('abstrak') is-invalid @enderror" name="abstrak" id="abstrak" placeholder="Abstrak"></textarea>

                                @error('abstrak')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <small class="form-text text-muted">Jan banyak banyak gan</small>

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptextra')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $(".pembimbing").select2({
                ajax: {
                    url: "/searchDosbing",
                    type: "get",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: $.map(response, item => {
                                return {
                                    text: item.identifier + " - " + item.name,
                                    id: item.identifier,
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endsection
