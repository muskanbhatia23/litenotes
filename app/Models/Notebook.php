<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
