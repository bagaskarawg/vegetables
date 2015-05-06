<?php namespace App\Http\Controllers;

use DB;
use App\Jadwal;
use App\Foodhall;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class JadwalController extends Controller {

	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('referensi.jadwal.index')
				->with('page', 'ref')
				->with('jadwal', Jadwal::all())
				->with('foodhall', Jadwal::join('tr_jadwal', 'tr_jadwal.jadwal_id', '=', 'jadwal.id')->join('foodhall', 'foodhall.id', '=', 'tr_jadwal.foodhall_id')->get());
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
		return view('referensi.jadwal.edit')
				->with('page', 'ref')
				->with('hari', Jadwal::where('id', $id)->get())
				->with('foodhall', Foodhall::all())
				->with('jadwal', Jadwal::join('tr_jadwal', 'tr_jadwal.jadwal_id', '=', 'jadwal.id')->join('foodhall', 'foodhall.id', '=', 'tr_jadwal.foodhall_id')->where('jadwal.id', $id)->get());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		foreach ($request->get('foodhall') as $fh) {
			if (!DB::table('tr_jadwal')->where('foodhall_id', $fh)->where('jadwal_id', $request->get('hari'))->get()) {
				DB::table('tr_jadwal')->insert([
					'jadwal_id' => $request->get('hari'),
					'foodhall_id' => $fh,
				]);
			}
		}

		return redirect()
				->route('jadwal')
				->withErrors(['success' => 'Data jadwal telah diperbarui!']);
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
