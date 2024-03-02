<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class Jadwal extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded =['id'];

    protected $with = [ 'sekolah', 'perminggu', 'instruktur'];



    public function perminggu(){
        return $this->hasMany(perminggu::class, 'id');
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

    public function instruktur(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function sekolah(){
        return $this->belongsTo(sekolah::class, 'sekolah_id', 'id');
    }
    

}

