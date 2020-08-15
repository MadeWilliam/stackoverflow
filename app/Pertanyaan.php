<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $guarded = [];

    public function pertanyaanHashtag()
    {
        return $this->belongsToMany(Tag::class, 'pertanyaan_has_tag', 'pertanyaan_id', 'tag_id');
    }
}
