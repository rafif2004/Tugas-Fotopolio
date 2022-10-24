@extends('master.admin')
@section('title', 'Show Siswa')
@section('content-title', 'Show Siswa')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
            <div class="card-header"></div>
                <div class="card-body text-center">
                        <img src="{{ asset('/template/img/'.$siswa->foto) }}" width="200" class="rounded-circle mt-3 mx-auto img-thumbail"><br>
                    <h4 class="">{{ $siswa->nama }}</h4>
                    <h5 class=""><i class="fas fa-id-card">{{ $siswa->nisn }}</i></h5>
                    <h5 class=""><i class="fas fa-venus-mars">{{ $siswa->jk }}</i></h5>
                    <h5 class=""><i class="fas fa-map">{{ $siswa->alamat }}</i></h5>
                </div>
          </div>
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-plus">Kontak Siswa</i></h6>
                </div>
                <div class="card-body text-center">
                    @foreach($kontak as $kontak)
                        <li>{{ $kontak->jenis_kontak}} : {{ $kontak->pivot->deskripsi}}</li>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-quote-left"></i>About Siswa</h6>
            </div>
                <div class="card-body">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">{{ $siswa->about}}</p>
                        <footer class="blockquote-footer">Ditulis Oleh <cite title="source title">{{ $siswa->nama}}</cite></footer>
                    </blockquote>
                </div>
            </div>
            <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tasks"></i>Project Siswa</h6>
            </div>
                <div class="card-body">
                    <div class="text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection