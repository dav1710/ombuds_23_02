<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tab extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function news()
    {
        return $this->belongsToMany(News::class, 'tab_news');
    }
	public function document()
    {
        return $this->belongsToMany(Document::class, 'document_tabs');
    }

	public function mediaFile()
    {
        return $this->belongsToMany(MediaFile::class, 'media_file_tabs');
    }
}
