@extends('app')

@section('title')
Tambah Pengguna @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Tambah Pengguna</div>
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
							<label for="username" class="col-md-2 control-label">Username:</label>
							<div class="col-md-10">
								<input type="text" name="username" id="username" class="form-control" placeholder="Username ..." value="{{ old('username') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-md-2 control-label">Password:</label>
							<div class="col-md-10">
								<input type="password" name="password" id="password" class="form-control" placeholder="Password ...">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-md-2 control-label">Email:</label>
							<div class="col-md-10">
								<input type="email" name="email" id="email" class="form-control" placeholder="Email ..." value="{{ old('email') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="nama_lengkap" class="col-md-2 control-label">Nama Lengkap:</label>
							<div class="col-md-10">
								<input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap ..." value="{{ old('nama_lengkap') }}">
							</div>
						</div>
						<div class="form-group">
							<label for="hak_akses" class="col-md-2 control-label">Hak Akses:</label>
							<div class="col-md-10">
								<select name="hak_akses" id="hak_akses" class="form-control">
									<option value="u">User</option>
									<option value="a">Admin</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-md-2 control-label">Status:</label>
							<div class="col-md-10">
								<select name="status" id="status" class="form-control">
									<option value="1">Aktif</option>
									<option value="0">Tidak Aktif</option>
								</select>
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