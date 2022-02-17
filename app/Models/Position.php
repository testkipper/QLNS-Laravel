<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table= "assignment";
    public $timestamps = false;
    public $fillable = ['id', 'name'];
    public function employee() {
         
        return $this->hasMany(employee::class, "id", "product_id");
    }
}
