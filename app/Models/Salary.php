<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table= "Project";
    protected $timestamps = false;
    protected $fillable=['id', 'base_salary ','pay_rate','from_date', 'to_date'];
}
