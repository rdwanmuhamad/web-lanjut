<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'address',
        'provinces_id',
        'regencies_id',
        'zip_code',
        'phone_number',
    ];

    protected $hidden = [

    ];
}
