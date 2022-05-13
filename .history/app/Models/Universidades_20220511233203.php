<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidades extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alpha_two_code',
        'country',
        'domains',
        'web_pages',
    ];
}
