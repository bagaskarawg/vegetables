@extends('app')

@section('title')
Daftar Pengguna @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Daftar Pengguna</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-success alert-dismissable">
							<button data-dismiss="alert" class="close">&times;</button>
							@foreach ($errors->all() as $error)
								<strong>Berhasil!</strong> {{ $error }}
							@endforeach
						</div>
					@endif
                    <div id="toolbar" class="btn-group">
                        <a href="{{ route('tambah-pengguna') }}" class="btn btn-default" data-toggle="tooltip" data-original-title="Tambah Mobil" data-placement="top">
                            Tambah Pengguna
                        </a>
                    </div>
					<table data-toggle="table" data-pagination="true" data-toolbar="#toolbar">
						<thead>
							<th data-align="center">No</th>
							<th data-sortable="true" data-align="center">Username</th>
							<th data-sortable="true" data-align="center">Nama Lengkap</th>
							<th data-sortable="true" data-align="center">Email</th>
							<th data-sortable="true" data-align="center">Hak Akses</th>
							<th data-sortable="true" data-align="center">Status</th>
							<th data-align="center">Aksi</th>
						</thead>
						<tbody>
<?php $i = 1; ?>
							@foreach($users as $user)
<?php
$hak = '';
$sts = '';
if ($user->hak_akses == 'a') {
	$hak = 'Admin';
} else {
	$hak = 'User';
}

if ($user->status == 1) {
	$sts = 'Aktif';
} else {
	$sts = 'Tidak aktif';
}
?>
								<tr>
									<td>{{ $i }}</td>
									<td>{{ $user->username }}</td>
									<td>{{ $user->nama_lengkap }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $hak }}</td>
									<td>{{ $sts }}</td>
									<td><a href="{{ route('edit-pengguna', $user->id) }}">Edit</a> | <a href="{{ route('hapus-pengguna', $user->id) }}" onclick="if(!confirm('Anda yakin ingin menghapus data pengguna tersebut?')) return false;">Hapus</a></td>
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
