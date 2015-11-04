<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Verktakar extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'title', 'body','hofundur'];
	//

}
