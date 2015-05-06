<?php namespace App\Http\Controllers;

use DB;
use Auth;
use App\Supplier;
use App\Foodhall;
use App\Penjualan;
use App\SupplySayur;
use App\GoodsReceipt;
use App\Http\Requests;
use App\DetailPenjualan;
use App\DetailGoodsReceipt;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GoodsReceiptController extends Controller {

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
		return view('transaksi.goods-receipt.index')
				->with('page', 'trx')
				->with('goods_receipt', GoodsReceipt::selectRaw("*, `goods_receipt`.`id` AS `main_id`")->join('pengguna', 'pengguna.id', '=', 'user_id')->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->orderBy('tgl_masuk', 'DESC')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id = null)
	{
		if (is_null($id)) {
			return view('transaksi.goods-receipt.tambah')
					->with('page', 'trx')
					->with('penjualan', DB::table('penjualan')->select(['*', 'penjualan.id AS main_id'])->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->whereNotExists(function($query) { $query->select(DB::raw(1))->from('goods_receipt')->whereRaw('goods_receipt.id = penjualan.id');})->get());
		} else {
			return view('transaksi.goods-receipt.add')
					->with('page', 'trx')
					->with('id', $id)
					->with('penjualan', Penjualan::select(['*', 'penjualan.id AS main_id'])->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->join('pengguna', 'pengguna.id', '=', 'user_id')->where('penjualan.id', $id)->first())
					->with('detail', DetailPenjualan::select(['*', 'sayur.id AS sayur_id', 'sayur.harga AS harga_sayur', 'tr_sayur.harga AS harga_supplier'])->join('tr_sayur', 'tr_sayur.id', '=', 'detail_penjualan.sayur_id')->join('sayur', 'tr_sayur.sayur_id', '=', 'sayur.id')->where('penjualan_id', $id)->get());
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id = null, Request $request)
	{
		$kode = $request->get('id');

		GoodsReceipt::create([
			'id' => $kode,
			'gr_no' => $request->get('gr_no'),
			'foodhall_id' => $request->get('foodhall_id'),
			'user_id' => Auth::user()->id,
			'tgl_masuk' => date('Y-m-d')
		]);

		foreach ($request->get('sayur') as $key => $value) {
			DetailGoodsReceipt::create([
				'gr_id' => $kode,
				'sayur_id' => $value,
				'kuantitas' => $request->get('kuantitas')[$key],
				'harga' => $request->get('harga')[$key],
				'harga_supplier' => $request->get('harga_supplier')[$key]
			]);
		}

		return redirect()
				->route('detail-goods-receipt', $kode)
				->withErrors(['success' => 'Data goods receipt telah disimpan di database!']);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return view('transaksi.goods-receipt.detail')
				->with('page', 'trx')
				->with('detail', DetailGoodsReceipt::select(['*', 'detail_goods_receipt.harga AS harga'])->join('tr_sayur', 'detail_goods_receipt.sayur_id', '=', 'tr_sayur.id')->join('sayur', 'sayur.id', '=', 'tr_sayur.sayur_id')->where('detail_goods_receipt.gr_id', $id)->get())
				->with('goods_receipt', GoodsReceipt::selectRaw("*, `goods_receipt`.`id` AS `main_id`, '`sayur`.`id` AS `sayur_id`'")->join('pengguna', 'pengguna.id', '=', 'user_id')->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->where('goods_receipt.id', $id)->first());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$penjualan = Penjualan::find($id)->first();
		return view('transaksi.goods-receipt.update')
				->with('page', 'trx')
				->with('id', $id)
				->with('foodhall', Foodhall::find($penjualan->foodhall_id))
				->with('penjualan', Penjualan::select(['*', 'penjualan.id AS main_id'])->join('foodhall', 'foodhall.id', '=', 'foodhall_id')->join('pengguna', 'pengguna.id', '=', 'user_id')->where('penjualan.id', $id)->first())
				->with('sayur', SupplySayur::select(['*', 'tr_sayur.id AS main_id', 'sayur.harga AS harga_sayur', 'tr_sayur.harga AS harga_supplier'])->join('sayur', 'sayur.id', '=', 'tr_sayur.sayur_id')->join('detail_penjualan', 'detail_penjualan.sayur_id', '=', 'tr_sayur.id')->join('penjualan', 'penjualan.id', '=', 'detail_penjualan.penjualan_id')->where('detail_penjualan.penjualan_id', $id)->get())
				->with('detail', DetailPenjualan::select(['*', 'sayur.id AS sayur_id'])->join('tr_sayur', 'tr_sayur.id', '=', 'detail_penjualan.sayur_id')->join('sayur', 'tr_sayur.sayur_id', '=', 'sayur.id')->where('penjualan_id', $id)->get());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$kode = $request->get('id');

		GoodsReceipt::create([
			'id' => $kode,
			'gr_no' => $request->get('gr_no'),
			'foodhall_id' => $request->get('foodhall_id'),
			'user_id' => Auth::user()->id,
			'tgl_masuk' => date('Y-m-d')
		]);

		foreach ($request->get('sayur') as $key => $value) {
			DetailGoodsReceipt::create([
				'gr_id' => $kode,
				'sayur_id' => $value,
				'kuantitas' => $request->get('kuantitas')[$key],
				'harga' => $request->get('harga')[$key],
				'harga_supplier' => $request->get('harga_supplier')[$key]
			]);
		}

		return redirect()
				->route('detail-goods-receipt', $kode)
				->withErrors(['success' => 'Data goods receipt telah disimpan di database!']);
	}
	
}
