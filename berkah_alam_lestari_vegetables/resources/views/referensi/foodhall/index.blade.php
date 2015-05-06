@extends('app')

@section('title')
Daftar Foodhall @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Daftar Foodhall</div>
				<div class="panel-body">
					@if(count($errors) > 0)
						<div class="alert alert-success alert-dismissable">
							<button data-dismiss="alert" class="close">&times;</button>
							@foreach($errors->all() as $error)
								<strong>Berhasil!</strong> {{ $error }}
							@endforeach
						</div>
					@endif
                    <div id="toolbar" class="btn-group">
                        <a href="{{ route('tambah-foodhall') }}" class="btn btn-default" data-toggle="tooltip" data-original-title="Tambah Mobil" data-placement="top">
                            Tambah Foodhall
                        </a>
                    </div>
					<table data-toggle="table" data-pagination="true" data-toolbar="#toolbar">
						<thead>
							<th data-align="center">No</th>
							<th data-sortable="true" data-align="center">Nama Foodhall</th>
							<th data-sortable="true" data-align="center">No Telepon</th>
							<th data-sortable="true" data-align="center">Operator</th>
							@if(Auth::user()->hak_akses == 'a')
								<th data-align="center">Aksi</th>
							@endif
						</thead>
						<tbody>
<?php $i = 1; ?>
							@foreach($foodhall as $fh)
								<tr>
									<td>{{ $i }}</td>
									<td>{{ ($fh->nama != '') ? $fh->nama : '-' }}</td>
									<td>{{ ($fh->telp != '') ? $fh->telp : '-' }}</td>
									<td>{{ ($fh->operator != '') ? $fh->operator : '-' }}</td>
									@if(Auth::user()->hak_akses == 'a')
										<td><a href="{{ route('edit-foodhall', $fh->id) }}">Edit</a> | <a href="{{ route('hapus-foodhall', $fh->id) }}" onclick="if(!confirm('Anda yakin ingin menghapus data foodhall tersebut?')) return false">Hapus</a></td>
									@endif
								</tr>
<?php $i++; ?>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection