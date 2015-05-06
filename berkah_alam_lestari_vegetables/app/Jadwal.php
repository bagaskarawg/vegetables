<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'jadwal';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['foodhall_id'];

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
