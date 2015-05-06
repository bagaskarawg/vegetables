@extends('app')

@section('title')
Tambah Supply Sayur @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tambah Supply Sayur</div>
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
							<label for="nama" class="col-md-2 control-label">Nama Supplier:</label>
							<div class="col-md-10">
								<select name="supplier" class="form-control" autofocus>
									@foreach($supplier as $spl)
										<option value="{{ $spl->id }}">{{ $spl->nama . '. Telp: ' . $spl->telp }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="sayur" class="col-md-2 control-label">Sayur:</label>
							<div class="col-md-12">
								<div class="row">
<?php $i = 1; ?>
								@foreach($sayur as $sy)
									<label class="control-label col-md-4">
										<input type="checkbox" name="sayur[]" value="{{ $sy->id }}" id="check{{ $i}}"{{ (old('sayur[]')) ? " checked" : '' }} onclick="toggleTextOn($(this), $('#text{{ $i }}'))"> {{ $sy->nama }}
									</label>
									<div class="col-md-2">
										<div class="input-group">
											<p class="input-group-addon"><small>Rp</small></p>
											<input type="text" name="harga[]" placeholder="Harga" class="form-control" id="text{{ $i}}"{{ (old('harga[]')) ? ' value="' . old('harga[]') . '"' : '' }} disabled>
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
								<input type="submit" name="kirim" value="Kirim" class="btn btn-primary">
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