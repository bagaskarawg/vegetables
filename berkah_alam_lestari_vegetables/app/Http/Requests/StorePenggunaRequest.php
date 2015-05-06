<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StorePenggunaRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'username' => 'required|min:2|max:25|unique:pengguna',
			'password' => 'required',
			'email' => 'required|unique:pengguna',
			'nama_lengkap' => 'required'
		];
	}

}
