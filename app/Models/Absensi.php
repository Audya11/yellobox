<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;


class Absensi extends Model
{
    use HasFactory;


    protected $guarded =['id'];
    protected $with =['sekolah','user'];

    public function sekolah(){
        return $this->belongsTo(sekolah::class, 'sekolah_id');
    }
    public function user(){
        return $this->hasOne(user::class);
    }
}
