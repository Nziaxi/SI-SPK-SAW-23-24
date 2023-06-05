<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;
    protected $table = 'rankings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_id',
        'total',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}