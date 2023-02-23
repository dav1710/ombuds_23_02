<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class News extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tabs()
    {
        return $this->belongsToMany(Tab::class, 'tab_news');
    }

	public function scopeFilter($query, array $filters)
	{
        if($filters['search']) {
		    $query->where('title_am', 'like', '%' . $filters['search'] . '%')
		        ->orWhere('title_en', 'like', '%' . $filters['search'] . '%')
		        ->orWhere('content_am', 'like', '%' . $filters['search'] . '%')
		        ->orWhere('content_en', 'like', '%' . $filters['search'] . '%');
        }
	}

	public function file($locale = 'am') {
        $files = (array)json_decode($this->{'file_' . $locale});
		return $files[0] ?? false;
	}

	public function images() {
		$am = (array)json_decode($this->file_am); 
		$en = (array)json_decode($this->file_en); 
		return array_merge($am, $en);
	}

	public function audios() {
		return [$this->audio_am, $this->audio_en];
	}
}
