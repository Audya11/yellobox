<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class sekolah extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded =['id'];

    protected $with = ['jadwal', 'absensi'];


    public function jadwal(){
        return $this->hasMany(Jadwal::class);

    }
public function absensi(){
    return $this->hasMany(Absensi::class);
} 

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
