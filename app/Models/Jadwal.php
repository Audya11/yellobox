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

    protected $with = ['instruktur, sekolah'];


    public function instruktur(){
        return $this->belongsTo(Instruktur::class, 'instruktur_id');

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

    public function sekolah(){
        return $this->belongsTo(sekolah::class, 'sekolah_id');

    }

}

