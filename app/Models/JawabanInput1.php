<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanInput1 extends Model
{
    use HasFactory;
    protected $table = 'jawab_input_1';
    protected $fillable = ['tahun', 'id_input','kode', 'STATUS', 'bukti_verifikasi','rencana'];
}
