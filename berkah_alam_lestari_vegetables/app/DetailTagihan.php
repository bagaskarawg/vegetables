<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTagihan extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'detail_tagihan';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'tagihan_id', 'sayur_id', 'kuantitas', 'harga', 'harga_supplier'];

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
