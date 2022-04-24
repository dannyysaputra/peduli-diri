<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    use HasFactory;

    protected $table = 'journey';
    protected $fillable = [
        'id_user',
        'tanggal',
        'lokasi',
        'suhu'
    ];

    public function userModels() {
        return $this->belongsTo(User::class);
    }
}
