<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirPort extends Model
{
    use HasFactory;

    protected $guarded = [];


    public const SHORTCODE = 'shortcode';
    public const NAME = 'name';
    public const CITY = 'city';
    public const COUNTRY = 'country';
    public const location = 'location';
}
