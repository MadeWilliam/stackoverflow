<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    protected $guarded = [];

    public function pertanyaanHasTag()
    {
        return $this->belongsToMany(Pertanyaan::class, 'pertanyaan_has_tag', 'tag_id', 'pertanyaan_id');
    }
}
