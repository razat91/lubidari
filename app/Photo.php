<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

    /**
     * @var array
     */
	protected $fillable = ['title','url', 'full-url'];

    /**
     * @var array
     */
    protected $guarded = ['id'];
}
