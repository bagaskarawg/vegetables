@extends('app')

@section('title')
Tambah Supplier @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tambah Supplier</div>
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
							<label for="nama" class="col-md-2 control-label">Nama Supplier:</label>
							<div class="col-md-10">
								<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Supplier ..." value="{{ old('nama') }}" autofocus>
							</div>
						</div>
						<div class="form-group">
							<label for="telp" class="col-md-2 control-label">Telepon Supplier:</label>
							<div class="col-md-10">
								<input type="text" name="telp" id="telp" class="form-control" placeholder="Telepon Supplier ..." value="{{ old('telp') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="alamat" class="col-md-2 control-label">Alamat Supplier:</label>
							<div class="col-md-10">
								<textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Supplier ...">{{ old('alamat') }}</textarea>
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