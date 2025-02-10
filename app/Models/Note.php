<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    //protected $fillable-- is for which we can fill securely
    //protected $guarded=[]; -- is for which fiels to be guard
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
