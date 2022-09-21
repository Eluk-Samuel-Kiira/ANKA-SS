<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cronjobs extends Model
{
    use HasFactory;
    public $timestamps=false;

    protected $table = "cronjobs";

    protected $fillable=['user','request_made','request_seen '];
}
