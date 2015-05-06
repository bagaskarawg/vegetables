@extends('app')

@section('title')
Tambah Goods Receipt @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tambah Goods Receipt</div>
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
					<p>Pilih Transaksi:</p>
					<table data-toggle="table">
						<thead>
							<th data-align="center">No</th>
							<th data-align="center">No Transaksi</th>
							<th data-align="center">Foodhall</th>
							<th data-align="center">Pilih</th>
						</thead>
						<tbody>
<?php $i = 1 ?>
							@foreach($penjualan as $pj)
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $pj->main_id }}</td>
										<td>{{ $pj->nama }}</td>
										<td><a href="{{ route('tambah-gr', $pj->main_id) }}">Pilih transaksi</a></td>
									</tr>
<?php $i++ ?>
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
</script>
@endsection