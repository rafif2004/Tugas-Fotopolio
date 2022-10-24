@extends('master.admin')
@section('title', 'Edit Project')
@section('content-title', 'Edit Project ')
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
    <form method="post" enctype="multipart/form-data" action="{{ route('masterproject.update' , $project->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">NAMA PROJECT</label>
                <input type="text" class="form-control" id="nama_project" name="nama_project" value="{{ $project->nama_project }}">
            </div>
            <div class="form-group">
                <label for="nama">DASKRIPSI PROJECT</label>
                <textarea type="deskripsi" id="deskripsi" name="deskripsi" class="form-control">{{ $project->deskripsi }}</textarea>
            </div>
            <div class="form-group">
                <label for="nama">TANGGAL PROJECT</label>
                <input type="date" class="form-control" id="tanggl" name="tanggl" value="{{ $project->tanggl }}">
            </div><br>
            <div class="form-group">
            <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Kembali</a>
                <input type="submit" class="btn btn-success" value="Simpan">
            </div>
        </form>
    </div>
</div>


@endsection