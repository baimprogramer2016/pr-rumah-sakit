<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterInput4Parameter extends Model
{
    use HasFactory;
    protected $table = 'master_input_4_parameter';
    protected $fillable = ['tahun','pasien_id','pasien','bpjs','tunai','kredit'];
}
