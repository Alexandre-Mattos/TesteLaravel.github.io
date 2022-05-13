<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversidadeUser extends Model
{
    use HasFactory;

    protected $table = "universidades_users";

    protected $fillable = [
        'user_id',
        'universidade_id',
    ];

}
