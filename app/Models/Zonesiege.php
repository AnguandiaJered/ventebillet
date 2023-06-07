<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zonesiege extends Model
{
    use HasFactory;

    protected $fillable = ['numsiege','sectionstade','status'];
}
