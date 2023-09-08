<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'applicant_id', 'poster_id', "post_id"];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function messages()
    {
        return $this->hasMany('App\Message'); 
    }
}
