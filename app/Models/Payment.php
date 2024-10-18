<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Specify table if different from default
    protected $table = 'payments';

    // Correct primary key spelling
    protected $primaryKey = 'id';

    // Fillable fields for mass assignment
    protected $fillable = ['enrollment_id', 'paid_date', 'amount'];

    // Disable timestamps if they are not in use (optional)
    public $timestamps = false;

    // Define relationship with Enrollment model
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enrollment_id');
    }
}
