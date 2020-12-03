<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';
    protected $fillable = ['id', 'name', 'age', 'phone', 'created_at', 'updated_at'];
}
