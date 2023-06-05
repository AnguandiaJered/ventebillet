<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stade extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nom','taille','nbr_place'];

    public function match()
    {
        return hasMany(Matchs::class,'stade_id','id');
    }
}
