<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table= "employee";
    public $timestamps = false;
    public $fillable=['id', 'last_name', 'first_name', 'gender', 'birth_date', 'phone','email','address','image'];
    
    public function Department() {
    return $this->belongsTo(Department::class,'department_id', 'id');
    }

    public function LabourContract() {
        return $this->hasMany(LabourContract::class,'employee_id', 'id');
    }

}
