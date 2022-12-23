<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paket;

class Korisnik extends Model
{
    use HasFactory;

    public function paketi()
    {
        return $this->hasMany(Paket::class);
    }
}
