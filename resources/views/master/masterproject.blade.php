@extends('master.admin')
@section('title', 'masterproject')
@section('content-title', 'Masterproject')
@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
	<div class="row">
		<div class="col-lg-6">
			<div class="card shadow mb-4">
		        <div style="font-weight: 500;" class="card-header bg-gradient-primary text-white">
			        <i class="fas fa-user me-1" style="margin-right: 5px;"></i>
			        Data Siswa
			    </div>
			    <div class="card-body">
					<table class="table table-hover" cellspacing="0" width="100%">
					    <thead>
					        <tr>
					            <th>Nisn</th>
					            <th>nama</th>
                                <th>Action</th>
					        </tr>
					    </thead>
						<tbody>
                        	@foreach ($data as $item)
                        	<tr>
                            	<td>{{ $item-> nisn }}</td>
                            	<td>{{ $item-> nama }}</td>
                            	<td class="text-center">
                                	<a class="btn btn-info" onclick="show({{ $item->id }})"><i class="fas fa-folder-open"></i></a>
                                	<a href="{{ route('masterproject.tambah', $item->id )}}" class="btn btn-info"><i class="fas fa-plus"></i></a>
                            	</td>
                        	</tr>
                        	@endforeach
						</tbody>
					</table>
                    <div class="card-footer d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>
			    </div>
		    </div>
		</div>

		<div class="col-lg-6">
			<div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header bg-gradient-primary text-white">
			        <i class="fas fa-book me-1" style="margin-right: 5px;"></i>
			        Project Siswa
			    </div>
			    <div id="project" class="card-body">
					<section class="text-center">
					    <h6>Pilih Siswa Terlebih Dahulu</h6>
					</section>
			    </div>
		    </div>
		</div>
	</div>
	<script>
		function show(id){
			$.get('masterproject/'+id, function(data){
				$('#project').html(data);
			})
		}
	</script>
@endsection