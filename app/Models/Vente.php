<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['client_id','match_id','prix','nbr_billet','datevente'];

    public function match(){
        return $this->belongsTo(Matchs::class,'match_id','id');
    }

    public function client(){
        return $this->belongsTo(Client::class,'client_id','id');
    }

    public function paiement()
    {
        return hasMany(Paiement::class,'vente_id','id');
    }
}
