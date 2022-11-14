<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{

    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'file_path', 'price', 'number'];

}
