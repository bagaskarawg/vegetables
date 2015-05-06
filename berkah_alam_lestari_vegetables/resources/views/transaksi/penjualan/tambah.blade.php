@extends('app')

@section('title')
Tambah Penjualan @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tambah Penjualan</div>
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
					<form name="add" method="post" class="form-horizontal">
						<div class="form-group">
							<label for="foodhall" class="col-md-2 control-label">Nama Foodhall:</label>
							<div class="col-md-10">
								<select name="foodhall" class="form-control" autofocus>
									@foreach($foodhall as $fh)
										<option value="{{ $fh->id }}">{{ $fh->nama . '. Telp: ' . $fh->telp }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="sayur" class="col-md-2 control-label">Supply Sayur:</label>
							<div class="col-md-12">
								<div class="row">
<?php $i = 1; ?>
								@foreach($sayur as $sy)
									<label class="control-label col-md-4">
										<input type="checkbox" name="sayur[]" value="{{ $sy->main_id }}" id="check{{ $i}}"{{ (old('sayur[]')) ? " checked" : '' }} onclick="toggleTextOn($(this), $('#text{{ $i }}'), $('#harga{{ $i }}'), $('#harga_s{{ $i }}'))"> {{ $sy->nama_sayur }} ({{ $sy->nama }})
										<input type="hidden" name="harga[]" value="{{ $sy->harga_sayur }}" id="harga{{ $i }}" disabled>
										<input type="hidden" name="harga_supplier[]" value="{{ $sy->harga_supplier }}" id="harga_s{{ $i }}" disabled>
									</label>
									<div class="col-md-2">
										<div class="input-group">
											<input type="text" name="kuantitas[]" placeholder="Kuantitas" class="form-control" id="text{{ $i}}"{{ (old('kuantitas[]')) ? ' value="' . old('kuantitas[]') . '"' : '' }} disabled>
											<p class="input-group-addon">{{ $sy->satuan }}</p>
										</div>
									</div>
<?php $i++ ?>
								@endforeach
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10 col-md-offset-2">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit" name="kirim" value="Kirim" class="btn btn-primary" onclick="if (!confirm('Anda yakin telah memeriksa semua inputan?\nKlik tombol ok jika anda yakin.')) return false">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript">
	function toggleTextOn(a, b, c, d) {
	    var isCheck = a.is(':checked');

	    a.prop('checked', isCheck);

	    if (isCheck) {
	        b.prop("disabled", false);
	        c.prop("disabled", false);
	        d.prop("disabled", false);
	    } else {
	        b.prop("disabled", true).prop('checked', false);
	        b.prop("value", "");
	        c.prop("disabled", true).prop('checked', false);
	        d.prop("disabled", true).prop('checked', false);
	    }
	}
</script>
@endsection