<?php
$home = '';
$ref = '';
$trx = '';
$user = '';
$lpr = '';
$akses = '';
$label = ' label-success';

if (isset($page)) {
	if ($page == 'ref') {
		$ref = ' active';
	} elseif ($page == 'home') {
		$home = ' class="active"';
	} elseif ($page == 'user') {
		$user = ' active';
	} elseif ($page == 'trx') {
		$trx = ' active';
	} elseif ($page == 'lpr') {
		$lpr = ' active';
	}
}

if (Auth::check()) {
	if (Auth::user()->hak_akses == 'a') {
		$akses = 'Admin';
		$label = ' label-success';
	} else {
		$akses = 'User';
		$label = ' label-default';
	}
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>@yield('title')- {{ config('site.name') }}</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/bootstrap-table.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/fonts.css') }}" rel="stylesheet" type="text/css" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
@if(Auth::check())
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">{{ config('site.name') }}</a>
			</div>
			<div class="collapse navbar-collapse" id="top-navbar">
				<ul class="nav navbar-nav">
					<li{!! $home !!}><a href="{{ url('/') }}">Beranda</a></li>
					<li class="dropdown{{ $trx }}">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Transaksi <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('penjualan') }}">Penjualan</a></li>
							<li><a href="{{ route('goods-receipt') }}">Goods Receipt</a></li>
							<li><a href="{{ route('tagihan') }}">Tagihan</a></li>
						</ul>
					</li>
					<li class="dropdown{{ $ref }}">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Referensi <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('foodhall') }}">Foodhall</a></li>
							<li><a href="{{ route('sayur') }}">Sayur</a></li>
							<li><a href="{{ route('supplier') }}">Supplier</a></li>
							<li><a href="{{ route('supply-sayur') }}">Supply Sayur</a></li>
							@if(Auth::user()->hak_akses == 'a')
								<li><a href="{{ URL::route('pengguna') }}">Pengguna</a></li>
								<li><a href="{{ URL::route('jadwal') }}">Jadwal Pengiriman</a></li>
							@endif
						</ul>
					</li>
					@if(Auth::user()->hak_akses == 'a')
						<li class="dropdown{{ $lpr }}">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Laporan <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('laporan-mingguan') }}" target="_blank">Penjualan Mingguan</a></li>
								<li><a href="{{ route('laporan-bulanan') }}" target="_blank">Penjualan Bulanan</a></li>
							</ul>
						</li>
					@endif
				</ul>
				<p class="navbar-text">Jam: <span id="tempatjam"></span> WIB</p>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown{{ $user }}">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->nama_lengkap }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-header hidden-xs">Hak Akses: <p class="label{{ $label }}" style="margin:0">{{ $akses }}</p></li>
							<li class="divider hidden-xs"></li>
							<li><a href="{{ route('ganti-pass') }}">Ganti Password</a></li>
							<li><a href="{{ url('admin/auth/logout') }}">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
@endif
@yield('content')
@if(Auth::check())
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<p class="navbar-text">Copyright &copy; 2015 - <a href="{{ url('/') }}">{{ config('site.name') }}</a>. All rights reserved.</p>
		</div>
	</nav>
@endif
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-table.min.js') }}"></script>
    <script language="JavaScript">
      function tampilJam()
      {
        var waktu = new Date();
        var jam = waktu.getHours();
        var menit = waktu.getMinutes();
        var detik = waktu.getSeconds();
        var teksjam = new String();

        if ( menit <= 9 )
          menit = "0" + menit;
        if ( detik <= 9 )
          detik = "0" + detik;

        teksjam = jam + ":" + menit + ":" + detik;
        tempatjam.innerHTML = teksjam;
        setTimeout ("tampilJam()", 1000);
      }

      window.onload = tampilJam
    </script>
@yield('custom-js')
</body>
</html>