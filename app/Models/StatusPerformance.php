<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPerformance extends Model
{
    use HasFactory;
    protected $table = 'status_performance';
    protected $fillable = ['kode','keterangan'];
}
