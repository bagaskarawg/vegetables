<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Sayur extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sayur';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'ean', 'mch', 'nama', 'satuan', 'harga'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	/**
	 * Turning off the timestamps for logout functionality
	 * 
	 * @var boolean
	 */
	public $timestamps = false;

	public static function generateEAN($id) {
		$query = "SELECT IFNULL(MAX(SUBSTRING(ean, 9, 5)), 0) + 1 AS nomor
							FROM sayur WHERE SUBSTRING(ean, 1, 8) = '" . $id . "'";
		$code = DB::select(DB::raw($query));
		$nomor = $code['0']->nomor;
		$code = $id . sprintf("%05s", $nomor);
		return $code;
	}

}
