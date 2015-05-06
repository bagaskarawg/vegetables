@extends('app')

@section('title')
Daftar Tagihan @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Daftar Tagihan</div>
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
                        <a href="{{ route('tambah-tagihan') }}" class="btn btn-default" data-toggle="tooltip" data-original-title="Tambah Mobil" data-placement="top">
                            Tambah Tagihan
                        </a>
                    </div>
					<table data-toggle="table" data-pagination="true" data-toolbar="#toolbar">
						<thead>
							<th data-align="center">No</th>
							<th data-sortable="true" data-align="center">No Transaksi</th>
							<th data-sortable="true" data-align="center">Foodhall</th>
							<th data-sortable="true" data-align="center">Tanggal Kirim</th>
							<th data-sortable="true" data-align="center">User</th>
							<th data-align="center">Aksi</th>
						</thead>
						<tbody>
<?php $i = 1; ?>
							@foreach($tagihan as $tg)
								<tr>
									<td>{{ $i }}</td>
									<td>{{ $tg->main_id }}</td>
									<td>{{ $tg->nama }}</td>
									<td>{{ date("d M Y", strtotime($tg->tgl_masuk)) }}</td>
									<td>{{ $tg->nama_lengkap }}</td>
									<td><a href="{{ route('detail-tagihan', $tg->main_id) }}">Lihat detail</a></td>
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