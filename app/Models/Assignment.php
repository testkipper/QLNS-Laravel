<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

    use HasFactory;
    protected $table= "assignment";
    public $timestamps = false;
    public $fillable = ['id', 'current_period','work_hours','quantity_work','work_completed'];

    public function employee() {    
        return $this->belongsTo(employee::class, "employee_id", "id");
    }

    public function project() {    
        return $this->belongsTo(project::class, "project_id", "id");
    }
}
