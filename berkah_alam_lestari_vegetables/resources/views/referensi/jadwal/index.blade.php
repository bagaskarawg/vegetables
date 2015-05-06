@extends('app')

@section('title')
Jadwal Pengiriman @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Jadwal Pengiriman</div>
				<div class="panel-body">
					@if(count($errors) > 0)
						<div class="alert alert-success alert-dismissable">
							<button data-dismiss="alert" class="close">&times;</button>
							@foreach($errors->all() as $error)
								<strong>Berhasil!</strong> {{ $error }}
							@endforeach
						</div>
					@endif
					<table data-toggle="table" data-pagination="true" data-toolbar="#toolbar">
						<thead>
							<th data-sortable="true" data-align="center" data-valign="middle">No</th>
							<th data-sortable="true" data-align="center" data-valign="middle">Hari</th>
							<th data-sortable="true" data-align="center" data-valign="middle">Foodhall</th>
							@if(Auth::user()->hak_akses == 'a')
								<th data-align="center" data-valign="middle">Aksi</th>
							@endif
						</thead>
						<tbody>
<?php $i = 1 ?>
							@foreach($jadwal as $j)
								<tr>
									<td>{{ $i }}</td>
									<td>{{ ($j->hari != '') ? $j->hari : '' }}</td>
									<td>
										@foreach($foodhall as $fh)
											@if($fh->jadwal_id == $j->id)
												<p class="no-margin">{{ ($fh->nama != '') ? $fh->nama : '-' }}</p>
											@endif
										@endforeach
									</td>
									<td><a href="{{ route('edit-jadwal', $j->id) }}">Edit Jadwal</a></td>
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
	<script src="{{ asset('js/accounting.min.js') }}"></script>
	<script type="text/javascript">
		function hargaFormatter(value) {
			return accounting.formatMoney(value, 'Rp ', '2', '.', ',');
		}
	</script>
@endsection