<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class sekolah extends Model
{
    use HasFactory, HasSlug;


    protected $guarded =['id'];
    // protected $with =['jadwal'];


    public function jadwal (){
        return $this->belongsToMany(Jadwal::class, 'jadwal_sekolah');
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
