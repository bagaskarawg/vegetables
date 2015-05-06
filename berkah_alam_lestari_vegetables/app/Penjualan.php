<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'penjualan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'foodhall_id', 'user_id', 'tgl_kirim'];

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

	public static function generateCode()
	{
		$year = date('y');
		$month = date('m');
		$day = date('d');
		$query = "SELECT IFNULL(MAX(SUBSTRING(id, 8, 5)), 0) + 1 AS nomor
					FROM penjualan WHERE SUBSTRING(id, 1, 2) = '" . $year . "' 
					AND SUBSTRING(id, 5, 2) = '" . $month . "'";
		$code = DB::select(DB::raw($query));
		$nomor = $code['0']->nomor;
		$code = $year . $day . $month . sprintf("%05s", $nomor);

		return $code;
	}

}
