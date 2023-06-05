<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $table = 'criterias';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nama_kriteria',
        'jenis',
    ];

    public function weight()
    {
        return $this->hasMany(Weight::class);
    }

    public function SubCriteria()
    {
        return $this->hasMany(SubCriteria::class, 'criteria_id');
    }
}