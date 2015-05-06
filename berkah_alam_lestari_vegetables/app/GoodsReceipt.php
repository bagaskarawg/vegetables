<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class GoodsReceipt extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'goods_receipt';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'gr_no', 'foodhall_id', 'user_id', 'tgl_masuk'];

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

}
