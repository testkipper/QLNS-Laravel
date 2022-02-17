<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabourContract extends Model
{
    use HasFactory;
    protected $table= "labour_contract";
    public $timestamps = false;
    public $fillable = ['id', 'current_period','work_hours','quantity_work','work_completed'];
    use HasFactory;

    public function Project()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }
}
