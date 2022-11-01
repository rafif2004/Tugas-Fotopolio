@extends('master.admin')
@section('title', 'Tambah Project')
@section('content-title', 'Tambah Project '. $siswa->nama)
@section('content')
@if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $item)
                            <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
<form method="post" enctype="multipart/form-data" action="{{ url('masterproject/store') }}">
    @csrf
    <input type="hidden" name="id_siswa" value="{{$siswa->id}}">
    <div class="form-group">
        <label for="nama">NAMA PROJECT</label>
        <input type="text" class="form-control" id="nama_project" name="nama_project" value="{{ old('nama_project') }}">
    </div>
    <div class="form-group">
        <label for="nama">DASKRIPSI PROJECT</label>
        <textarea id="deskripsi" name="deskripsi" class="form-control" value="{{ old('deskripsi') }}"></textarea>
    </div>
    <div class="form-group">
        <label for="nama">TANGGAL PROJECT</label>
        <input type="date" class="form-control" id="tanggl" name="tanggl" value="{{ old('tanggl') }}">
    </div><br>
    <div class="form-group">
        <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Kembali</a>
        <input type="submit" class="btn btn-success" value="simpan">
    </div>
</form>
@endsection