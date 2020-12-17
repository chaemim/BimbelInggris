@extends('layouts.layout')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div id="accordion">
                @if(Session::has('success_message'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('success_message')}}
                </div>
                @endif
                @if(Session::has('danger_message'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{Session::get('danger_message')}}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <a class="card-link text-center" data-toggle="collapse" href="#collapseOne">
                            <h4>Profil {{$user->name}}</h4>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> --}}
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <p><i class="fas fa-user-tie"></i> <span class="font-weight-bold">{{$user->name}}</span></p>
                            <p><i class="fas fa-map-marker-alt"></i> <span
                                    class="font-weight-bold">{{$user->alamat}}</span></p>
                            <p><i class="fas fa-at"></i> <span class="font-weight-bold">{{$user->email}}</span></p>
                            <p><i class="fas fa-birthday-cake"></i> <span class="font-weight-bold">{{$user->ttl}}</span>
                            </p>
                            <p><i class="fas fa-phone"></i> <span class="font-weight-bold">{{$user->telepon}}</span></p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <p>
                            <a class="btn btn-sm btn-primary" data-toggle="collapse" href="#collapseExample"
                                role="button" aria-expanded="false">Ganti Password</a>
                        </p>
                    </div>

                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <form action="{{asset('/gantipassword')}}" method="POST">
                                @csrf
                                <fieldset>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="nama">Password Lama</label>
                                            <input id="nama" type="password" name="password_lama" id="password_lama"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="nama">Password Baru</label>
                                            <input id="nama" type="password" name="password" class="form-control"
                                                id="password">
                                            @error('password')
                                            <span class="invalidfeedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="nama">Konfirmasi Password Baru</label>
                                            <input id="nama" type="password" name="password_confirmation"
                                                class="form-control" id="password_confirmation">

                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <input type="submit" class="btn btn-success btn-send" value="Simpan">
                                        <input type="Button" class="btn btn-primary btnsend" value="Kembali"
                                            onclick="history.go(-1)">
                                    </div>
                                    <hr>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('title')
Profil
@endsection

@section('css')
<style>
    .card-link h4,
    .card-body .fas,
    .card-footer .fab {
        color: #14abac
    }

    .card-footer .fab:hover {
        color: #f1bc19
    }

    .card p {
        color: #503534
    }

    .card-footer .fab {
        font-size: 35px !important;
        margin: 0 5px;
    }

    .btn-primary {
        background-color: #14abac
    }

    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
    }

</style>
@endsection
