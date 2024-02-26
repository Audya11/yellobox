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
    protected $with =['sekolah','user'];

    public function sekolah(){
        return $this->belongsTo(sekolah::class);
    }
    public function user(){
        return $this->hasOne(user::class, 'user_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('tanggal')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
