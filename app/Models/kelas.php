<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
class kelas extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded =['id'];

    protected $with = ['sekolah', 'siswa'];

    public function sekolah(){
        return $this->belongsTo(sekolah::class, 'sekolah_id');

    }
public function siswa(){
    return $this->hasMany(Siswa::class);
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
