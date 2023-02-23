<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    use HasFactory;

	public function tabs() {
		return $this->belongsToMany(Tab::class, 'media_file_tabs');
	}

	protected $fillable = [
    	'file_am',
		'file_en'
	];
}
