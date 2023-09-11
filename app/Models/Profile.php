<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    // harus sesuai yang ada di web.php
    {
        return  $this->belongsTo(User::class);
    }
}
