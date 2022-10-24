@if($project->isEmpty())
    <h6>Siswa Belum Memiliki Project</h6>
@else
    @foreach($project as $item)
    <div class="card">
        <div class="card-header">
            <strong> {{ $item->nama_project}}</strong>
        </div>
        <div class="card-body">
            <strong>Nama Project</strong>
            <p>{{ $item->nama_project }}</p>
            <strong>Tanggal Project</strong>
            <p>{{ $item->tanggl }}</p>
            <strong>Deskripsi Project</strong>
            <p>{{ $item->deskripsi }}</p>
        </div>
        <div class="card-footer">  
            <form action="/masterproject/{{$item->id}}" method="post">
            @csrf
            @method('delete')    
                <button type="submit" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                <a href="{{ route('masterproject.edit', $item->id)}}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>    
            </form>
        </div>
    </div>
    <br>
    @endforeach
    @endif