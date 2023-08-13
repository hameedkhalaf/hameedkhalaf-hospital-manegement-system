<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Appointment extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name'];
    public $fillable= ['name'];
}
