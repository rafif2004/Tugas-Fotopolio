@extends('master.admin')
@section('title', 'Edit Kontak')
@section('content-title', 'Edit Kontak')
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
<div class="card shadow mb-4">
    <div class="card-body">
    <form method="post" enctype="multipart/form-data" action="{{ url('tambahjenis/store') }}">
            @csrf
            <input type="hidden">
            <div class="form-group">
            </div>
            <div class="form-group">
                <label for="nama">Tambah Jenis Kontak</label>
                <textarea type="Tambah Jenis Kontak" id="Tambah Jenis Kontak" name="jenis_kontak" class="form-control"></textarea>
            </div>
            <br>
            <div class="form-group">
            <a href="{{ route('masterkontak.index') }}" class="btn btn-danger">Kembali</a>
                <input type="submit" class="btn btn-success" value="Simpan">
            </div>
        </form>
    </div>
</div>
@endsection