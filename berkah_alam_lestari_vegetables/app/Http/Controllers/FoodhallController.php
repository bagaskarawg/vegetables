<?php namespace App\Http\Controllers;

use Auth;
use App\Foodhall;
use App\Http\Requests;
use App\Http\Requests\StoreFoodhallRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FoodhallController extends Controller {

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
		return view('referensi.foodhall.index')
				->with('page', 'ref')
				->with('foodhall', Foodhall::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('referensi.foodhall.tambah')
				->with('page', 'ref');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreFoodhallRequest $request)
	{
		$c = Foodhall::create($request->except('kirim', '_token'));

		if ($c) {
			return redirect()->route('foodhall')
					->withErrors(['success' => 'Data foodhall telah disimpan ke database!']);
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
		return view('referensi.foodhall.edit')
				->with('foodhall', Foodhall::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, StoreFoodhallRequest $request)
	{
		if (Auth::user()->hak_akses != 'a') {
			return redirect()->back();
		}
		$fh = Foodhall::find($id);

		$fh->nama = $request->nama;
		$fh->telp = $request->telp;
		$fh->operator = $request->operator;

		$fh->save();

		return redirect()
				->route('foodhall')
				->withErrors(['success' => 'Data foodhall telah diperbarui!']);
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
		Foodhall::destroy($id);

		return redirect()
				->route('foodhall')
				->withErrors(['success' => 'Data foodhall telah dihapus dari database!']);
	}

}
