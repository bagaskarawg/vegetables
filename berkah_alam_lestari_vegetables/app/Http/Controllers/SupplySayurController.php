<?php namespace App\Http\Controllers;

use Auth;
use App\Sayur;
use App\Supplier;
use App\SupplySayur;
use App\Http\Requests;
use App\Http\Requests\StoreSupplyRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SupplySayurController extends Controller {

	public function __construct()
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
		return view('referensi.supply-sayur.index')
				->with('page', 'ref')
				->with('sayur', SupplySayur::selectRaw('supplier_id, sayur.nama AS nama_sayur, tr_sayur.harga AS harga_sayur')->join('sayur', 'sayur.id', '=', 'tr_sayur.sayur_id')->join('supplier', 'supplier_id', '=', 'supplier.id')->distinct()->get())
				->with('supply', SupplySayur::selectRaw('*, `tr_sayur`.`id` AS `main_id`')->join('sayur', 'sayur.id', '=', 'tr_sayur.sayur_id')->join('supplier', 'supplier.id', '=', 'tr_sayur.supplier_id')->groupBy('supplier_id')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('referensi.supply-sayur.tambah')
				->with('page', 'ref')
				->with('supplier', Supplier::all())
				->with('sayur', Sayur::orderBy('nama')->get());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreSupplyRequest $request)
	{
		foreach ($request->get('sayur') as $key => $value) {
			SupplySayur::create([
				'supplier_id' => $request->get('supplier'),
				'sayur_id' => $value,
				'harga' => $request->get('harga')[$key]
			]);
		}

		return redirect()
				->route('supply-sayur')
				->withErrors(['success' => 'Data supply sayur telah disimpan di database!']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Auth::user()->hak_akses != 'a') {
			return redirect()->back();
		}
		return view('referensi.supply-sayur.edit')
				->with('page', 'ref')
				->with('sayur', SupplySayur::select(['*', 'tr_sayur.harga AS harga_sayur'])->join('sayur', 'sayur.id', '=', 'tr_sayur.sayur_id')->where('supplier_id', $id)->get())
				->with('supplier', Supplier::where('id', $id)->get());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		if (Auth::user()->hak_akses != 'a') {
			return redirect()->back();
		}
		foreach ($request->get('sayur') as $key => $value) {
			$s = SupplySayur::whereRaw("sayur_id =" . $value . " AND supplier_id=" . $request->get('supplier'));
			if ($s->count()) {
				$s->update(['harga' => $request->get('harga')[$key]]);
			}
		}

		return redirect()
				->route('supply-sayur')
				->withErrors(['success' => 'Data supply sayur telah diperbarui!']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Auth::user()->hak_akses != 'a') {
			return redirect()->back();
		}
		$s = SupplySayur::where('supplier_id', $id);
		$s->delete();

		return redirect()
				->route('supply-sayur')
				->withErrors(['success' => 'Data supply sayur telah dihapus dari database!']);
	}

}
