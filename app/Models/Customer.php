<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function interests()
    {
        return $this->belongsToMany(Interest::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    public function getFullNameAttribute()
    {
        return "$this->name $this->surname";
    }
}
