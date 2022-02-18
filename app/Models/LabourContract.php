<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabourContract extends Model
{
    use HasFactory;
    protected $table= "labour_contract";
    public $timestamps = false;
    public $fillable = ['id', 'name','from_date','to_date'];
    use HasFactory;

    public function Employee()
    {
        return $this->belongsTo(Employee::class,'employee_id','id');
    }

}
