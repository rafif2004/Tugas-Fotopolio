@extends('master.admin')
@section('title', 'mastersiswa')
@section('content-title', 'Mastersiswa')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
        <div class="col-lg-4">
            <div style="font-weight: 500; " class="mt-3"> 
                <a href="{{ route('mastersiswa.create')}}" class="btn btn-success">TambahData</a>
            </div>
            </div>
            <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">NISN</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">EDIT</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $i=> $item)
                    <tr>
                        <th scope="row">{{++ $i }}</th>
                        <td>{{$item -> nama}}</td>
                        <td>{{$item -> nisn}}</td>
                        <td>{{$item -> alamat}}</td>
                    <td>
                        <a href="{{ route('mastersiswa.show', $item -> id)}}" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                        <a href="{{ route('mastersiswa.edit', $item -> id)}}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('mastersiswa.hapus', $item -> id)}}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection