<?php

namespace App\Models;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function photo(){
        return $this->hasMany(Photo::class);
    }
}
