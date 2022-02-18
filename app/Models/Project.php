<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table= "Project";
    public $timestamps = false;
    public $fillable=['id', 'name','from_date', 'to_date'];
}
