@extends('app')

@section('title')
Daftar Supply Sayur @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Daftar Supply Sayur</div>
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
                        <a href="{{ route('tambah-supply-sayur') }}" class="btn btn-default" data-toggle="tooltip" data-original-title="Tambah Mobil" data-placement="top">
                            Tambah Supply Sayur
                        </a>
                    </div>
					<table data-toggle="table" data-pagination="true" data-toolbar="#toolbar">
						<thead>
							<th data-align="center" data-valign="middle">No</th>
							<th data-sortable="true" data-align="center" data-valign="middle">Nama Supplier</th>
							<th data-sortable="true" data-align="center" data-valign="middle">Nama Sayur</th>
							<th data-sortable="true" data-align="center" data-valign="middle">Harga</th>
							@if(Auth::user()->hak_akses == 'a')
								<th data-align="center" data-valign="middle">Aksi</th>
							@endif
						</thead>
						<tbody>
<?php $i = 1; ?>
							@foreach($supply as $sp)
								<tr>
									<td>{{ $i }}</td>
									<td>{{ $sp->nama }}</td>
									<td>
									@foreach($sayur as $s)
										@if($s->supplier_id == $sp->supplier_id)
											<p class="no-margin">{{ $s->nama_sayur }}</p>
											<hr class="hr" />
										@endif
									@endforeach
									</td>
									<td>
									@foreach($sayur as $s)
										@if($s->supplier_id == $sp->supplier_id)
											<p class="no-margin">Rp {{ number_format($s->harga_sayur, 2, ',', '.') }}</p>
											<hr class="hr" />
										@endif
									@endforeach
									</td>
									@if(Auth::user()->hak_akses == 'a')
										<td><a href="{{ route('edit-supply-sayur', $sp->supplier_id) }}">Edit Harga</a> | <a href="{{ route('hapus-supply-sayur', $sp->supplier_id) }}" onclick="if(!confirm('Anda yakin ingin menghapus data supply sayur tersebut?')) return false">Hapus</a></td>
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
		document.ready(function() {
			$("#harga").val() = accounting.formatMoney($("#harga").val(), 'Rp ', '2', '.', ',');
		});

		function hargaFormatter(value) {
			return accounting.formatMoney(value, 'Rp ', '2', '.', ',');
		}
	</script>
@endsection