<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Siswa extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded =['id'];
    protected $with =['kelas'];
    public function kelas(){
        return $this->belongsTo(sekolah::class, 'kelas_id'); 
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
