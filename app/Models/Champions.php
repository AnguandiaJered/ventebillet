<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Champions extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','country'];

    public function match()
    {
        return hasMany(Matchs::class,'champions_id','id');
    }
}
