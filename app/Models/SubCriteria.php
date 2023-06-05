<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_criterias';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'criteria_id',
        'keterangan',
        'nilai',
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }
}