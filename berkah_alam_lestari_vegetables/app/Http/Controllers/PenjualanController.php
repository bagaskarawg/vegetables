<?php namespace App\Http\Controllers;

use Auth;
use App\Sayur;
use App\Supplier;
use App\Foodhall;
use App\Penjualan;
use App\SupplySayur;
use App\Http\Requests;
use App\DetailPenjualan;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PenjualanController extends Controller {

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
		return view('transaksi.penjualan.index')
				->with('page', 'trx')
				->with('penjualan', Penjualan::selectRaw("*, `penjualan`.`id` AS `main_id`")->join('pengguna', 'pengguna.id', '=', 'user_id')->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->orderBy('tgl_kirim', 'DESC')->orderBy('main_id', 'DESC')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('transaksi.penjualan.tambah')
				->with('page', 'trx')
				->with('supplier', Supplier::all())
				->with('foodhall', Foodhall::all())
				->with('sayur', SupplySayur::selectRaw('*, `tr_sayur`.`id` AS `main_id`, `sayur`.`nama` AS `nama_sayur`, `sayur`.`harga` AS `harga_sayur`, `tr_sayur`.`harga` AS `harga_supplier`')->join('sayur', 'sayur.id', '=', 'tr_sayur.sayur_id')->join('supplier', 'supplier.id', '=', 'tr_sayur.supplier_id')->orderBy('nama_sayur')->get());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$kode = Penjualan::generateCode();

		Penjualan::create([
			'id' => $kode,
			'foodhall_id' => $request->get('foodhall'),
			'user_id' => Auth::user()->id,
			'tgl_kirim' => date('Y-m-d')
		]);

		foreach ($request->get('sayur') as $key => $value) {
			DetailPenjualan::create([
				'penjualan_id' => $kode,
				'sayur_id' => $value,
				'kuantitas' => $request->get('kuantitas')[$key],
				'harga' => $request->get('harga')[$key],
				'harga_supplier' => $request->get('harga_supplier')[$key]
			]);
		}

		return redirect()
				->route('detail-penjualan', $kode)
				->withErrors(['success' => 'Data penjualan telah disimpan di database!']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('transaksi.penjualan.detail')
				->with('page', 'trx')
				->with('detail', DetailPenjualan::join('tr_sayur', 'tr_sayur.id', '=', 'detail_penjualan.sayur_id')->join('sayur', 'tr_sayur.sayur_id', '=', 'sayur.id')->where('detail_penjualan.penjualan_id', $id)->get())
				->with('penjualan', Penjualan::selectRaw("*, `penjualan`.`id` AS `main_id`")->join('pengguna', 'pengguna.id', '=', 'user_id')->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->where('penjualan.id', $id)->first());
	}

}
