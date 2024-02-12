<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class perminggu extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    protected $with =['user'];


    public function user(){
        return $this->hasMany(user::class);

    }



}
