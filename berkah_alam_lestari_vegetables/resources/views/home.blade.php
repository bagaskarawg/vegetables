@extends('app')

@section('title')
Beranda @endsection

@section('content')
<div class="container-fluid">
	<div class="row-fluid">
		@if (count($errors) > 0)
			<div class="col-md-12">
				<div class="alert alert-success alert-dismissable">
					<button data-dismiss="alert" class="close">&times;</button>
					@foreach ($errors->all() as $error)
						<strong>Berhasil!</strong> {{ $error }}
					@endforeach
				</div>
			</div>
		@endif
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><center>Jadwal Pengiriman Hari {{ $hari[0]->hari }}</center></div>
				<div class="panel-body">
					<div class="row">
						@if(count($jadwal) > 0)
							<ol>
								@foreach($jadwal as $j)
									<li class="col-md-6 no-margin">{{ $j->nama . ': ' . $j->telp }}</li>
								@endforeach
							</ol>
						@else
							<p class="col-md-12 no-margin">Tidak ada jadwal pengiriman pada hari ini.</p>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><center>Pembayaran Tagihan Hari Ini</center></div>
				<div class="panel-body">
					<div class="row">
						@if(count($tagihan) > 0)
							<ol>
								@foreach($tagihan as $t)
<?php if($t->telp == '')
		$telp = '-';
	else
		$telp = $t->telp; ?>
									<li class="col-md-12 no-margin">{{ $t->nama . '. Telp: ' . $telp . '. Sayur: ' . $t->nama_sayur . '. Qty: ' . number_format(str_replace(',', '.', $t->qty), 0, ',', '.') . ' ' . $t->satuan . '. Tagihan: Rp ' . number_format(str_replace(',', '.', $t->qty) * $t->harga_supplier, 2, ',', '.') }}</li>
								@endforeach
							</ol>
						@else
							<p class="col-md-12 no-margin">Tidak ada pembayaran tagihan pada hari ini.</p>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 hidden-xs">
			<div class="panel panel-default">
				<div class="panel-body">
					<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
					<hr />
					<div id="containers" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-js')
	<script src="{{ asset('js/highcharts.js') }}"></script>
	<script src="{{ asset('js/exporting.js') }}"></script>
	<script type="text/javascript">
		$(function () {
		    $('#container').highcharts({
		        chart: {
		            type: 'bar'
		        },
		        title: {
		            text: 'Grafik Penjualan Sayur Bulan Ini'
		        },
		        xAxis: {
		            categories: [<?php foreach ($sayur as $s) { echo "'" . $s->nama . "', "; } ?>],
		            title: {
		                text: 'Sayur'
		            }
		        },
		        yAxis: {
		            min: 0,
		            title: {
		                text: 'Kuantitas (kilogram)',
		                align: 'middle'
		            },
		            labels: {
		                overflow: 'justify'
		            }
		        },
		        tooltip: {
		            valueSuffix: ' kg'
		        },
		        plotOptions: {
		            bar: {
		                dataLabels: {
		                    enabled: true
		                }
		            }
		        },
		        legend: {
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'top',
		            x: -40,
		            y: 100,
		            floating: true,
		            borderWidth: 1,
		            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
		            shadow: true
		        },
		        credits: {
		            enabled: false
		        },
		        series: [{
		            name: 'Kuantitas',
		            data: [<?php foreach ($sayur as $s) { echo $s->qty . ","; } ?>]
		        }]
		    });
		});
	</script>
	<script type="text/javascript">
		$(function () {
		    $('#containers').highcharts({
		        chart: {
		            type: 'bar'
		        },
		        title: {
		            text: ''
		        },
		        xAxis: {
		            categories: [<?php foreach ($sayur as $s) { echo "'" . $s->nama . "', "; } ?>],
		            title: {
		                text: 'Sayur'
		            }
		        },
		        yAxis: {
		            min: 0,
		            title: {
		                text: 'Rupiah',
		                align: 'middle'
		            },
		            labels: {
		                overflow: 'justify'
		            }
		        },
		        tooltip: {
		            valuePrefix: 'Rp '
		        },
		        plotOptions: {
		            bar: {
		                dataLabels: {
		                    enabled: true
		                }
		            }
		        },
		        legend: {
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'top',
		            x: -40,
		            y: 100,
		            floating: true,
		            borderWidth: 1,
		            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
		            shadow: true
		        },
		        credits: {
		            enabled: false
		        },
		        series: [{
		        	name: 'Total Pendapatan',
		        	data: [<?php foreach ($sayur as $s) { echo $s->harga * str_replace(',', '.', $s->qty) . ", "; } ?>]
		        }]
		    });
		});
	</script>
@endsection