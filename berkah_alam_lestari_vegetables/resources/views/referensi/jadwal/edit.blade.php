@extends('app')

@section('title')
Edit Jadwal @endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Jadwal</div>
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
							<label for="hari" class="col-md-2 control-label">Hari:</label>
							<div class="col-md-10">
								<select name="hari" class="form-control">
									@foreach($hari as $h)
										<option value="{{ $h->id }}">{{ $h->hari }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="foodhall" class="col-md-2 control-label">Foodhall:</label>
							<div class="col-md-10">
<?php $i = 0 ?>
								@foreach($foodhall as $fh)
									<label class="control-label col-md-6">
										<input type="checkbox" name="foodhall[]" value="{{ $fh->id }}"<?php for ($i=0; $i < count($jadwal); $i++) { echo ($fh->id == $jadwal[$i]->foodhall_id) ? ' checked' : ''; } ?>> {{ $fh->nama }}
									</label>
<?php $i++ ?>
								@endforeach
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