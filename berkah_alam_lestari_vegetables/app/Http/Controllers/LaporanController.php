<?php namespace App\Http\Controllers;

use DB;
use App\Penjualan;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LaporanController extends Controller {

	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	public function index()
	{
		$day = date('d') - 7;
		$date = date('Y-m-d');
		if ($day < 1) {
			$month = date('m') - 1;
			$day += date('t');
			$date = date('Y-') . $month . '-' . $day;
		}

		return view('laporan.mingguan')
				->with('page', 'lpr')
				->with('kode', Penjualan::generateCode())
				->with('penjualan', DB::table('penjualan')->selectRaw('*, penjualan.id AS main_id, tr_sayur.sayur_id AS article_id, tr_sayur.id AS sayur_id, sayur.nama AS nama_sayur, detail_penjualan.harga AS harga_dp, SUM(detail_penjualan.kuantitas) AS qty, detail_penjualan.harga AS harga, supplier.nama AS nama_supplier')->join('detail_penjualan', 'penjualan.id', '=', 'detail_penjualan.penjualan_id')->join('tr_sayur', 'tr_sayur.id', '=', 'detail_penjualan.sayur_id')->join('sayur', 'tr_sayur.sayur_id', '=', 'sayur.id')->join('pengguna', 'penjualan.user_id', '=', 'pengguna.id')->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->join('supplier', 'supplier.id', '=', 'tr_sayur.supplier_id')->whereBetween('tgl_kirim', [$date, date('Y-m-d')])->groupBy(['sayur.nama', 'supplier.nama'])->get());
	}

	public function bulanan()
	{
		$month = date('m') - 1;
		$date = date('Y-') . $month . '-' . date('d');

		return view('laporan.bulanan')
				->with('page', 'lpr')
				->with('penjualan', DB::table('penjualan')->selectRaw('*, penjualan.id AS main_id, tr_sayur.sayur_id AS article_id, tr_sayur.id AS sayur_id, sayur.nama AS nama_sayur, detail_penjualan.harga AS harga_dp, SUM(detail_penjualan.kuantitas) AS qty, detail_penjualan.harga AS harga, supplier.nama AS nama_supplier')->join('detail_penjualan', 'penjualan.id', '=', 'detail_penjualan.penjualan_id')->join('tr_sayur', 'tr_sayur.id', '=', 'detail_penjualan.sayur_id')->join('sayur', 'tr_sayur.sayur_id', '=', 'sayur.id')->join('pengguna', 'penjualan.user_id', '=', 'pengguna.id')->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->join('supplier', 'supplier.id', '=', 'tr_sayur.supplier_id')->whereBetween('tgl_kirim', [$date, date('Y-m-d')])->groupBy(['sayur.nama', 'supplier.nama'])->get());
	}

	public function mingguan_detail($id)
	{
		$day = date('d') - 7;
		$date = date('Y-m-d');
		if ($day < 1) {
			$month = date('m') - 1;
			$day += date('t');
			$date = date('Y-') . $month . '-' . $day;
		}

		return view('laporan.mingguan')
				->with('page', 'lpr')
				->with('detail', true)
				->with('penjualan', DB::table('penjualan')->selectRaw('*, penjualan.id AS main_id, tr_sayur.sayur_id AS article_id, tr_sayur.id AS sayur_id, sayur.nama AS nama_sayur, detail_penjualan.harga AS harga_dp, SUM(detail_penjualan.kuantitas) AS qty, detail_penjualan.harga AS harga, supplier.nama AS nama_supplier')->join('detail_penjualan', 'penjualan.id', '=', 'detail_penjualan.penjualan_id')->join('tr_sayur', 'tr_sayur.id', '=', 'detail_penjualan.sayur_id')->join('sayur', 'tr_sayur.sayur_id', '=', 'sayur.id')->join('pengguna', 'penjualan.user_id', '=', 'pengguna.id')->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->join('supplier', 'supplier.id', '=', 'tr_sayur.supplier_id')->whereBetween('tgl_kirim', [$date, date('Y-m-d')])->groupBy(['sayur.nama', 'supplier.nama'])->where('detail_penjualan.sayur_id', $id)->get());
	}

	public function bulanan_detail($id)
	{
		$month = date('m') - 1;
		$date = date('Y-') . $month . '-' . date('d');

		return view('laporan.bulanan')
				->with('page', 'lpr')
				->with('detail', true)
				->with('penjualan', DB::table('penjualan')->selectRaw('*, penjualan.id AS main_id, tr_sayur.sayur_id AS article_id, tr_sayur.id AS sayur_id, sayur.nama AS nama_sayur, detail_penjualan.harga AS harga_dp, SUM(detail_penjualan.kuantitas) AS qty, detail_penjualan.harga AS harga, supplier.nama AS nama_supplier')->join('detail_penjualan', 'penjualan.id', '=', 'detail_penjualan.penjualan_id')->join('tr_sayur', 'tr_sayur.id', '=', 'detail_penjualan.sayur_id')->join('sayur', 'tr_sayur.sayur_id', '=', 'sayur.id')->join('pengguna', 'penjualan.user_id', '=', 'pengguna.id')->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->join('supplier', 'supplier.id', '=', 'tr_sayur.supplier_id')->whereBetween('tgl_kirim', [$date, date('Y-m-d')])->groupBy(['sayur.nama', 'supplier.nama'])->where('detail_penjualan.sayur_id', $id)->get());
	}

}