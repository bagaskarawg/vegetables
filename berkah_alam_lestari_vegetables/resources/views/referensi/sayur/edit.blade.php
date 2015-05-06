@extends('app')

@section('title')
Edit Sayur @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Sayur</div>
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
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label for="nama" class="col-md-2 control-label">Nama Sayur:</label>
							<div class="col-md-10">
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Sayur ..." value="{{ $sayur->nama }}" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="satuan" class="col-md-2 control-label">Satuan:</label>
							<div class="col-md-10">
								<input type="text" name="satuan" id="satuan" class="form-control" placeholder="Satuan ..." value="{{ $sayur->satuan }}">
							</div>
						</div>
						<div class="form-group">
							<label for="harga" class="col-md-2 control-label">Harga:</label>
							<div class="col-md-10">
								<div class="input-group">
									<p class="input-group-addon">Rp</p>
									<input type="text" name="harga" id="harga" class="form-control" placeholder="Harga ..." value="{{ $sayur->harga }}">
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