<?php namespace App\Http\Controllers;

use App\Jadwal;
use App\Penjualan;
use App\Http\Requests;
use App\DetailPenjualan;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Home extends Controller {

	function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$date = date('Y-m-d');

		$day = date('d') - 14;
		if ($day < 0) {
			$month = date('m') - 1;
			$day = $day + cal_days_in_month(CAL_GREGORIAN, $month, date('Y'));
			$date = date('Y-') . $month . '-' . $day;
		} else {
			$date = date('Y-m-') . $day;
		}

		$months = date('m') - 1;
		$dates = date('Y-') . $months . '-' . date('d');

		return view('home')
				->with('page', 'home')
				->with('sayur', Penjualan::selectRaw('penjualan.id, DAY(penjualan.tgl_kirim) AS day, tr_sayur.sayur_id, sayur.nama, SUM(detail_penjualan.kuantitas) AS qty, DAY(penjualan.tgl_kirim) AS hari, detail_penjualan.harga AS harga')->join('detail_penjualan', 'detail_penjualan.penjualan_id', '=', 'penjualan.id')->join('tr_sayur', 'tr_sayur.id', '=', 'detail_penjualan.sayur_id')->join('sayur', 'sayur.id', '=', 'tr_sayur.sayur_id')->whereBetween('penjualan.tgl_kirim', [$dates, date('Y-m-d')])->groupBy('detail_penjualan.sayur_id')->get())
				->with('hari', Jadwal::where('id', date('N'))->get())
				->with('jadwal', Jadwal::join('tr_jadwal', 'tr_jadwal.jadwal_id', '=', 'jadwal.id')->join('foodhall', 'foodhall.id', '=', 'tr_jadwal.foodhall_id')->where('jadwal.id', date('N'))->get())
				->with('tagihan', Penjualan::selectRaw('*, sayur.nama AS nama_sayur, SUM(detail_penjualan.kuantitas) AS qty')->join('detail_penjualan', 'detail_penjualan.penjualan_id', '=', 'penjualan.id')->join('tr_sayur', 'tr_sayur.id', '=', 'detail_penjualan.sayur_id')->join('sayur', 'sayur.id', '=', 'tr_sayur.sayur_id')->join('supplier', 'supplier.id', '=', 'tr_sayur.supplier_id')->where('tgl_kirim', $date)->groupBy('detail_penjualan.sayur_id')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
