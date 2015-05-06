<?php namespace App\Http\Controllers;

use Auth;
use Hash;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use App\Http\Requests\ApplyPassChangeRequest;

use Illuminate\Http\Request;

class UserController extends Controller {

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
		return view('members.index')
				->with('page', 'ref')
				->with('users', User::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('members.tambah')
				->with('page', 'ref');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StorePenggunaRequest $request)
	{
		$c = User::create($request->except('kirim', '_token'));

		if ($c) {
			return redirect()
					->route('pengguna')
					->withErrors(['success' => 'Data pengguna telah  disimpan di database!']);
		}
	}

	/**
	 * Change user's currently logged in password.
	 *
	 * @return Response
	 */
	public function change_password()
	{
		return view('members.change')
				->with('page', 'user');
	}

	/**
	 * Apply changes in user's currently logged in password.
	 *
	 * @return Response
	 */
	public function apply_changes(ApplyPassChangeRequest $request)
	{
		if (!Hash::check($request->get('password_saat_ini'), Auth::user()->password)) {
			return redirect()
					->route('ganti-pass')
					->withErrors(['success' => 'Password yang anda masukkan salah!']);
		}

		$user = User::find(Auth::user()->id);

		$user->password = $request->get('password_baru');

		$user->save();

		return redirect()
				->route('home')
				->withErrors(['success' => 'Password telah diperbarui! Anda bisa masuk menggunakan password baru anda.']);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('members.edit')
				->with('page', 'ref')
				->with('user', User::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UpdatePenggunaRequest $request)
	{
		$user = User::find($id);

		if ($request->has('password')) {
			$user->password = $request->get('password');
		}

		$user->email = $request->get('email');
		$user->nama_lengkap = $request->get('nama_lengkap');

		$user->save();

		return redirect()
				->route('pengguna')
				->withErrors(['success' => 'Data pengguna telah berhasil diperbarui!']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return redirect()
				->route('pengguna')
				->withErrors(['success' => 'Data telah dihapus dari database!']);
	}

}
