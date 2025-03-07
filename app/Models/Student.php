<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table= 'Students';
    protected $primarykey= 'id';
    protected $fillable= ['name', 'address', 'mobile', 'e_mail'];
    use HasFactory;
}
