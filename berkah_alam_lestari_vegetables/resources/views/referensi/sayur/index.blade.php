@extends('app')

@section('title')
Daftar Sayur @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Daftar Sayur</div>
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
                        <a href="{{ route('tambah-sayur') }}" class="btn btn-default" data-toggle="tooltip" data-original-title="Tambah Mobil" data-placement="top">
                            Tambah Sayur
                        </a>
                    </div>
					<table data-toggle="table" data-pagination="true" data-toolbar="#toolbar">
						<thead>
							<th data-align="center">No</th>
							<th data-sortable="true" data-align="center">EAN</th>
							<th data-sortable="true" data-align="center">MCH</th>
							<th data-sortable="true" data-align="center">Article No</th>
							<th data-sortable="true" data-align="center">Deskripsi</th>
							<th data-sortable="true" data-align="center">Satuan</th>
							<th data-sortable="true" data-formatter="hargaFormatter" data-align="center">Harga Per Satuan</th>
							@if(Auth::user()->hak_akses == 'a')
								<th data-align="center">Aksi</th>
							@endif
						</thead>
						<tbody>
<?php $i = 1; ?>
							@foreach($sayur as $sy)
								<tr>
									<td>{{ $i }}</td>
									<td>{{ ($sy->ean != '') ? $sy->ean : '-' }}</td>
									<td>{{ ($sy->mch != '') ? $sy->mch : '-' }}</td>
									<td>{{ $sy->id }}</td>
									<td>{{ ($sy->nama != '') ? $sy->nama : '-' }}</td>
									<td>{{ ($sy->satuan != '') ? $sy->satuan : '-' }}</td>
									<td>{{ ($sy->harga != '') ? $sy->harga : '-' }}</td>
									@if(Auth::user()->hak_akses == 'a')
										<td><a href="{{ route('edit-sayur', $sy->id) }}">Edit</a> | <a href="{{ route('hapus-sayur', $sy->id) }}" onclick="if(!confirm('Anda yakin ingin menghapus data sayur tersebut?')) return false">Hapus</a></td>
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

@section('custom-js')
	<script src="{{ asset('js/accounting.min.js') }}"></script>
	<script type="text/javascript">
		function hargaFormatter(value) {
			return accounting.formatMoney(value, 'Rp ', '2', '.', ',');
		}
	</script>
@endsection