<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public $table = "contacts";
    protected $fillable = ["first_name","last_name","email"];
}
