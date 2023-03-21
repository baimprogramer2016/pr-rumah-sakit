<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetunjukTeknis extends Model
{
    use HasFactory;
    protected $table = 'petunjuk_teknis';
    protected $fillable = ['input', 'keterangan'];
}
