@extends('app')

@section('title')
Laporan Penjualan Mingguan @endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading hidden-print">Laporan Penjualan Mingguan <p class="pull-right"><a href="#" onclick="window.close()" class="btn-sm btn-danger">Tutup halaman</a> <a href="#" onclick="window.print()" class="btn-sm btn-success">Print</a></p></div>
				<div class="panel-body">
				{{$kode}}
					<div class="visible-print" style="text-align:center">
						<h4>{{ config('site.name') }}</h4>
						<p class="no-margin">Address: {{ config('site.address') }}</p>
						<p class="no-margin">Telp/Fax: {{ config('site.telephone') }}.</p>
						<p class="no-margin">Phone: {{ config('site.mobile') }} - {{ config('site.mobile2') }}</p>
						<p>Email: {{ config('site.email') }}.</p>
					</div>
					<table data-toggle="table">
						<thead>
							<th data-align="center">No</th>
							<th data-align="center">Article</th>
							<th data-align="center">Deskripsi</th>
							<th data-align="center">Supplier</th>
							<th data-align="center">Tanggal Kirim</th>
							<th data-align="center">Kuantitas</th>
							<th data-align="center" data-formatter="hargaFormatter">Harga Supplier</th>
							<th data-align="center" data-formatter="hargaFormatter">Harga Satuan</th>
							<th data-align="center" data-formatter="hargaFormatter">Total Transaksi</th>
							<th data-align="center" data-formatter="hargaFormatter">Total Laba</th>
							@if(!isset($detail))
							<th data-align="center" class="hidden-print">Detail</th>
							@endif
						</thead>
						<tbody>
<?php $i = 1;$tp = 0;$lb = 0; ?>
						@foreach($penjualan as $pj)
<?php $harga = $pj->harga_dp * str_replace(',', '.', $pj->qty) ?>
<?php $laba = ($pj->harga_dp - $pj->harga_supplier) * str_replace(',', '.', $pj->qty) ?>
							<tr>
								<td>{{ $i }}</td>
								<td>{{ $pj->article_id }}</td>
								<td>{{ $pj->nama_sayur }}</td>
								<td>{{ $pj->nama_supplier }}</td>
								<td>{{ date('j M Y', strtotime($pj->tgl_kirim)) }}</td>
								<td>{{ number_format($pj->qty, 0, ',', '.') . ' ' . $pj->satuan }}</td>
								<td>{{ $pj->harga_supplier }}</td>
								<td>{{ $pj->harga }}</td>
								<td>{{ $harga }}</td>
								<td>{{ $laba }}</td>
								@if(!isset($detail))
								<td class="hidden-print"><a href="{{ route('detail-laporan-mingguan', $pj->sayur_id) }}" target="_blank">Lebih Detail</a></td>
								@endif
							</tr>
<?php $i++;$tp += $harga;$lb += $laba; ?>
						@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="8"><center>Total pendapatan/laba minggu ini:</center></td>
								<th colspan="3"><center><u>Rp {{ number_format($tp, 2, ',', '.') }}</u> / <u>Rp {{ number_format($lb, 2, ',', '.') }}</u></center></th>
							</tr>
						</tfoot>
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