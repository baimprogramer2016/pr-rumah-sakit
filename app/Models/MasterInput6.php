<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterInput6 extends Model
{
    use HasFactory;
    protected $table = 'master_input_6';
    protected $fillable = ['tahun', 'kode', 'kategori_input_id', 'keterangan'];
}
