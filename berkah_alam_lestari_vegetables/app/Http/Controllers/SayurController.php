<?php namespace App\Http\Controllers;

use Auth;
use App\Sayur;
use App\Http\Requests;
use App\Http\Requests\StoreSayurRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SayurController extends Controller {

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
		return view('referensi.sayur.index')
				->with('page', 'ref')
				->with('sayur', Sayur::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('referensi.sayur.tambah')
				->with('page', 'ref');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreSayurRequest $request)
	{
		$c = Sayur::create([
			'id' => $request->get('id'),
			'ean' => Sayur::generateEAN($request->get('id')),
			'mch' => $request->get('mch'),
			'nama' => $request->get('nama'),
			'satuan' => $request->get('satuan'),
			'harga' => $request->get('harga')
		]);

		if ($c) {
			return redirect()
					->route('sayur')
					->withErrors(['success' => 'Data sayur telah disimpan ke database!']);
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
		return view('referensi.sayur.edit')
				->with('page', 'ref')
				->with('sayur', Sayur::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, StoreSayurRequest $request)
	{
		if (Auth::user()->hak_akses != 'a') {
			return redirect()->back();
		}
		$sy = Sayur::find($id);

		$sy->nama = $request->get('nama');
		$sy->satuan = $request->get('satuan');
		$sy->harga = $request->get('harga');

		$sy->save();

		return redirect()
				->route('sayur')
				->withErrors(['success' => 'Data sayur telah diperbarui!']);
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
		Sayur::destroy($id);

		return redirect()
				->route('sayur')
				->withErrors(['success' => 'Data sayur telah dihapus dari database!']);	
	}

}
