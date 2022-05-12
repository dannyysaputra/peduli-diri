<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
    use HasFactory;

    protected $table = 'journey';
    protected $guarded = ['id'];
    
    // protected $fillable = [
    //     'id_user',
    //     'tanggal',
    //     'lokasi',
    //     'suhu'
    // ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
