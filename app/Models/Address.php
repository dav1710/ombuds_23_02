<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

	protected $fillable = [
    	'region_am',
		'region_en',
		'work_time_am',
		'work_time_en',
		'address_am',
		'address_en',
		'mail',
		'phone',
		'phone_messanger',
	];
}
