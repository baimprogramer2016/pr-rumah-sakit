<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterInput2 extends Model
{
    use HasFactory;
    protected $table = 'master_input_2';
    protected $fillable = ['tahun','kode','kategori_input_id','key_performance','numerator','denominator','target_condition','target'];
}
