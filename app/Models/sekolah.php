<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    use HasFactory;


    protected $guarded =['id'];
    protected $with =['jadwal'];


    public function jadwal (){
        return $this->belongsTo(Jadwal::class, 'jadwal_id');
    }




}
