<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paiement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['vente_id','montant','devise','datepaie'];

    public function vente(){
        return $this->belongsTo(Vente::class,'vente_id','id');
    }
}
