<?php

namespace App\Models;

use App\Models\Link;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function link() {
        return $this->belongsTo(Link::class);
    }
}
