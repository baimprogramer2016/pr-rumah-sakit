<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterInput4 extends Model
{
    use HasFactory;

    protected $table = 'master_input_4';
    protected $fillable = ['tahun','kode','kategori_input_id','pasien_id','uraian','total_bl','bpjs','tunai','kredit','bpjs_par','tunai_par','kredit_par'];
}
