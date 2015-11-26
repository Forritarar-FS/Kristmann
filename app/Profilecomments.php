<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Profilecomments extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'profile_name', 'comment', 'current_user', 'current_userPhoto'];
	//

}
