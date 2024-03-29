<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterInput1 extends Model
{
    use HasFactory;
    protected $table = 'master_input_1';
    protected $fillable = ['tahun', 'kode', 'kategori_input_id', 'keterangan'];

    
    public function jawaban1(){
        return $this->hasOne(JawabanInput1::class,'id_input','id');
    }

}
