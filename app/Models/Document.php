<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

	protected $fillable = [
    	'title_am',
		'title_ru',
		'document_am',
		'document_ru',
	];

	public function tabs() {
		return $this->belongsToMany(Tab::class, 'document_tabs');
	}

	public function scopeFilter($query, array $filters)
	{
        if($filters['search']){
            $query->where('title_am', 'like', '%' . $filters['search'] . '%')
            ->orWhere('title_en', 'like', '%' . $filters['search'] . '%');
        }
	}
}
