@extends('app')

@section('title')
Tambah Tagihan @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tambah Tagihan</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger alert-dismissable">
							<button data-dismiss="alert" class="close">&times;</button>
							<strong>Whoops!</strong> Ada masalah dengan data yang anda masukkan.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="row-fluid">
						<div class="col-md-12">
							<p>Konfirmasi Detail Transaksi:</p>
							<hr class="hr" />
						</div>
						<div class="col-md-6">
							<h4 class="no-margin">No Transaksi: <b>{{ $penjualan->main_id }}</b></h4>
							<h4 class="no-margin">Foodhall: <b>{{ $penjualan->nama }}</b></h4>
						</div>
						<div class="col-md-6">
							<h4 class="no-margin">User: <b>{{ $penjualan->nama_lengkap }}</b></h4>
							<h4 class="no-margin">Tanggal Kirim: <b>{{ date('j M Y', strtotime($penjualan->tgl_kirim)) }}</b></h4>
							<br />
						</div>
						<div class="col-md-12">
							<table data-toggle="table">
								<thead>
									<th data-align="center">No</th>
									<th data-align="center">Article</th>
									<th data-align="center">Deskripsi</th>
									<th data-align="center">Kuantitas</th>
									<th data-align="center" data-formatter="hargaFormatter">Harga Satuan</th>
									<th data-align="center" data-formatter="hargaFormatter">Total</th>
								</thead>
								<tbody>
<?php $i = 1;$total = 0;$total_qty = 0; ?>
								@foreach($detail as $dt)
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $dt->sayur_id }}</td>
										<td>{{ $dt->nama }}</td>
										<td>{{ number_format(str_replace(',', '.', $dt->kuantitas), 0, ',', '.') . ' ' . $dt->satuan }}</td>
										<td>{{ $dt->harga_supplier }}</td>
										<td>{{ str_replace(',', '.', $dt->kuantitas) * $dt->harga_supplier }}</td>
									</tr>
<?php $i++;$total += str_replace(',', '.', $dt->kuantitas) * $dt->harga_supplier;$total_qty += str_replace(',', '.', $dt->kuantitas);$sat = $dt->satuan ?>
								@endforeach
								</tbody>
								<tfoot>
									<td colspan="3"><center>Total Kuantitas:</center></td>
									<th><center><u>{{ number_format($total_qty, 0, ',', '.') }}</u></center></th>
									<td><center>Total Tagihan:</center></td>
									<th><center><u>Rp {{ number_format($total, 2, ',', '.') }}</u></center></th>
								</tfoot>
							</table>
							<br />
							<form class="form-horizontal" method="post">
								<div class="form-group">
									<div class="col-md-12">
										<input type="hidden" name="id" value="{{ $id }}">
										<input type="hidden" name="foodhall_id" value="{{ $penjualan->foodhall_id }}">
										<input type="hidden" name="user_id" value="{{ $penjualan->user_id }}">
										@foreach($detail as $dt)
											<input type="hidden" name="sayur[]" value="{{ $dt->sayur_id }}">
											<input type="hidden" name="kuantitas[]" value="{{ str_replace(',', '.', $dt->kuantitas) }}">
										<input type="hidden" name="harga[]" value="{{ $dt->harga_sayur }}">
										<input type="hidden" name="harga_supplier[]" value="{{ $dt->harga_supplier }}">
										@endforeach
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="submit" name="submit" value="Konfirmasi" class="btn btn-primary" onclick="if (!confirm('Anda yakin telah memeriksa semua inputan?\nKlik tombol ok jika anda yakin.')) return false">
										<!-- <a href="{{ route('edit-tagihan', $id) }}" class="btn btn-danger">Update Detail</a> -->
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
	<script src="{{ asset('js/accounting.min.js') }}"></script>
	<script type="text/javascript">
		function toggleTextOn(a, b) {
		    var isCheck = a.is(':checked');

		    a.prop('checked', isCheck);

		    if (isCheck) {
		        b.prop("disabled", false);
		    } else {
		        b.prop("disabled", true).prop('checked', false);
		        b.prop("value", "");
		    }
		}
		function hargaFormatter(value) {
			return accounting.formatMoney(value, 'Rp ', '2', '.', ',');
		}
	</script>
@endsection