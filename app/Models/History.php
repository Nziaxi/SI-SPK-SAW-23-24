<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'histories';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'employee_id',
        'criteria_id',
        'sub_criteria_id',
        'year',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function weight()
    {
        return $this->belongsTo(Weight::class, 'criteria_id');
    }

    public function subCriteria()
    {
        return $this->belongsTo(SubCriteria::class, 'sub_criteria_id');
    }
}