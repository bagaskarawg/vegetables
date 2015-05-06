@extends('app')

@section('title')
Ganti Password @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Ganti Password</div>
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
							<label for="password_saat_ini" class="col-md-3 control-label">Password Saat Ini:</label>
							<div class="col-md-9">
								<input type="password" name="password_saat_ini" id="password_saat_ini" class="form-control" placeholder="Password Saat Ini ...">
							</div>
						</div>
						<div class="form-group">
							<label for="password_baru" class="col-md-3 control-label">Password Baru:</label>
							<div class="col-md-9">
								<input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="Password Baru ...">
							</div>
						</div>
						<div class="form-group">
							<label for="konfirmasi_password_baru" class="col-md-3 control-label">Konfirmasi Password Baru:</label>
							<div class="col-md-9">
								<input type="password" name="konfirmasi_password_baru" id="konfirmasi_password_baru" class="form-control" placeholder="Konfirmasi Password Baru ...">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-9 col-md-offset-3">
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