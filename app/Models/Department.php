<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table= "Employee";
    protected $timestamps = false;
    protected $fillable=['id', 'name'];
    
    public function employee() {
        return $this->hasMany(employee::class);
        //return $this->hasMany(Comment::class, 'foreign_key’);
        //return $this->hasMany(Comment::class, 'foreign_key’,
        ‘owner_key’);
}
