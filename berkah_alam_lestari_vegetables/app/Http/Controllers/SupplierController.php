<?php namespace App\Http\Controllers;

use Auth;
use App\Supplier;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupplierRequest;

use Illuminate\Http\Request;

class SupplierController extends Controller {

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
		return view('referensi.supplier.index')
				->with('page', 'ref')
				->with('supplier', Supplier::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('referensi.supplier.tambah')
				->with('page', 'ref');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreSupplierRequest $request)
	{
		$c = Supplier::create($request->except('kirim', '_token'));

		if ($c) {
			return redirect()
					->route('supplier')
					->withErrors(['success' => 'Data supplier telah disimpan di database!']);
		}
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
		return view('referensi.supplier.edit')
				->with('supplier', Supplier::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, StoreSupplierRequest $request)
	{
		if (Auth::user()->hak_akses != 'a') {
			return redirect()->back();
		}
		$sp = Supplier::find($id);

		$sp->nama = $request->nama;
		$sp->telp = $request->telp;
		$sp->alamat = $request->alamat;

		$sp->save();

		return redirect()
				->route('supplier')
				->withErrors(['success' => 'Data supplier telah diperbarui!']);
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
		Supplier::destroy($id);

		return redirect()
				->route('supplier')
				->withErrors(['success' => 'Data supplier telah dihapus dari database!']);
	}

}
