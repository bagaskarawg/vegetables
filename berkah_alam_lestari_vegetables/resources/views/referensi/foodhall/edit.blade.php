@extends('app')

@section('title')
Edit Foodhall @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Foodhall</div>
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
							<label for="nama" class="col-md-2 control-label">Nama Foodhall:</label>
							<div class="col-md-10">
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Foodhall ..." value="{{ (old('nama')) ? old('nama') : $foodhall->nama }}" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="telp" class="col-md-2 control-label">Telepon Foodhall:</label>
							<div class="col-md-10">
								<input type="text" name="telp" id="telp" class="form-control" placeholder="Telepon Foodhall ..." value="{{ (old('telp')) ? old('telp') : $foodhall->telp }}">
							</div>
						</div>
						<div class="form-group">
							<label for="operator" class="col-md-2 control-label">Operator Telepon:</label>
							<div class="col-md-10">
								<input type="text" name="operator" id="operator" class="form-control" placeholder="Operator Telepon ..." value="{{ (old('operator')) ? old('operator') : $foodhall->operator }}">
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