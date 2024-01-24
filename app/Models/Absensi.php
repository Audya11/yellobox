<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Absensi extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded =['id'];
    protected $with =['id'];

    public function sekolah(){
        return $this->belongsTo(sekolah::class, 'sekolah_id');
    }
    public function user(){
        return $this->hasOne(user::class);
    }
}
