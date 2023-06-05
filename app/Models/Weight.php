<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;

    protected $table = 'weights';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'criteria_id',
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