<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table= "Employee";
    public $timestamps = false;
    protected $fillable=['id', 'last_name', 'first_name', 'gender', 'birth_date', 'phone','email','address', 'department_id'];
    
    public function Department() {
    return $this->belongsTo(Department::class,'department_id', 'id');

}
}
