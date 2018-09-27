<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $image_directory = '/images/';
    protected $fillable = ['file'];

    public function getFileAttribute($photo){
        
        return $this->image_directory . $photo;
    }
}
