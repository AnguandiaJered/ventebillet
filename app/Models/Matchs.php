<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matchs extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['stade_id','champions_id','equipe_principale','equipe_adverse','date_match','heure_match'];

    public function stade(){
        return $this->belongsTo(Stade::class,'stade_id','id');
    }

    public function champion(){
        return $this->belongsTo(Champions::class,'champions_id','id');
    }

    public function vente()
    {
        return hasMany(Vente::class,'match_id','id');
    }
}
