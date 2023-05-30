<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;
    protected $table = 'wali';
    protected $primaryKey='id';
    protected $fillable = ['nama_wali','pekerjaan','idstudents'];

    public function student(){
        return $this->belongsTo('App\Models\Students');
    }
}
