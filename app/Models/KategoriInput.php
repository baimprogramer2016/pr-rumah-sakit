<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriInput extends Model
{
    use HasFactory;
    protected $table = 'kategori_input';
    protected $fillable = ['id','keterangan','input'];


    public function input1(){
        return $this->hasMany(MasterInput1::class,'kategori_input_id','id');
    }
}
