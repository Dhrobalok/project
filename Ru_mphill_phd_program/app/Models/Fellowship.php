<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fellowship extends Model
{
    use HasFactory;
    protected $fillable = [
       'name','roll','session','account','course','year','month','rate','section_officer','secretary','director',
    ];
}
