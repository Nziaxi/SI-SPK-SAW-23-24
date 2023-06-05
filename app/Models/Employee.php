<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'departement_id',
        'nama_karyawan',
        'alamat',
    ];

    public function departement()
    {
        return $this->belongsTo(Divisi::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }

    public function scoreSub()
    {
        return $this->belongsTo(Score::class);
    }

    public function ranking()
    {
        return $this->hasOne(Ranking::class);
    }
}