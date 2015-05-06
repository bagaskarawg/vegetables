@extends('app')

@section('title')
Detail Tagihan @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading hidden-print">Detail Tagihan <p class="pull-right"><a href="#" onclick="window.print()" class="btn-sm btn-success">Print</a></p></div>
				<div class="panel-body">
					@if(count($errors) > 0)
						<div class="alert alert-success alert-dismissable hidden-print">
							<button data-dismiss="alert" class="close">&times;</button>
							@foreach($errors->all() as $error)
								<strong>Berhasil!</strong> {{ $error }}
							@endforeach
						</div>
					@endif
					<div class="visible-print" style="text-align:center">
						<h4>{{ config('site.name') }}</h4>
						<p class="no-margin">Address: {{ config('site.address') }}</p>
						<p class="no-margin">Telp/Fax: {{ config('site.telephone') }}.</p>
						<p class="no-margin">Phone: {{ config('site.mobile') }} - {{ config('site.mobile2') }}</p>
						<p>Email: {{ config('site.email') }}.</p>
						<h4 class="no-margin">Tagihan</h4>
						<hr />
					</div>
					<div class="col-md-6 col-sm-6">
						<p>No Faktur: <b><i>{{ $tagihan->main_id }}</i></b></p>
						<p>Foodhall: <b><i>{{ $tagihan->nama }}</i></b></p>
					</div>
					<div class="col-md-6 col-sm-6">
						<p>User: <b><i>{{ $tagihan->nama_lengkap }}</i></b></p>
						<p>Tanggal Kirim: <b><i>{{ date('j M Y', strtotime($tagihan->tgl_masuk)) }}</i></b></p>
					</div>
					<hr class="hr" />
					<div class="col-md-12">
						<table data-toggle="table" class="table">
							<thead>
								<th data-align="center">No</th>
								<th data-align="center">Article</th>
								<th data-align="center">Deskripsi</th>
								<th data-align="center">Supplier</th>
								<th data-align="center">Kuantitas</th>
								<th data-align="center" data-formatter="hargaFormatter">Harga Satuan</th>
								<th data-align="center" data-formatter="hargaFormatter">Total</th>
							</thead>
							<tbody>
<?php $i = 1;$total = 0;$total_qty = 0; ?>
								@foreach($detail as $det)
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $det->sayur_id }}</td>
										<td>{{ $det->nama_sayur }}</td>
										<td>{{ $det->nama_supplier }}</td>
										<td>{{ number_format(str_replace(',', '.', $det->kuantitas), 0, ',', '.') . ' ' . $det->satuan }}</td>
										<td>{{ $det->harga }}</td>
										<td>{{ $det->kuantitas * $det->harga }}</td>
									</tr>
<?php $i++;$total += $det->kuantitas * $det->harga;$total_qty += str_replace(',', '.', $det->kuantitas) ?>
								@endforeach
							</tbody>
							<tfoot>
									<td colspan="4"><center>Total Kuantitas:</center></td>
									<th><center><u>{{ number_format($total_qty, 0, ',', '.') }}</u></center></th>
									<td><center>Total Faktur:</center></td>
									<th><center><u>Rp {{ number_format($total, 2, ',', '.') }}</u></center></th>
							</tfoot>
						</table>
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
		function hargaFormatter(value) {
			return accounting.formatMoney(value, 'Rp ', '2', '.', ',');
		}
	</script>
@endsection