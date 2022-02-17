<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table= "department";
    public $timestamps = false;
    public $fillable = ['id', 'name'];
    
    public function employee() {
         
        return $this->hasMany(Product::class, "id", "product_id");
    }
}
