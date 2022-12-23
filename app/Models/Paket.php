<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dostava;
use App\Models\Korisnik;

class Paket extends Model
{
    use HasFactory;

    public function korisnik()
    {
        return $this->belongsTo(Korisnik::class);
    }

    public function dostava()
    {
        return $this->belongsTo(Dostava::class);
    }
}
