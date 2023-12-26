<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todoModel extends Model
{
    use HasFactory;
    protected $table="todo";
    protected $fillable = ['user_id', 'name', 'complete']; // Define the columns that can be mass-assigned.

    public function users () {
        return $this->belongsTo(User::class);
    }
}
