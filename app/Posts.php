<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //table name
    protected $table = 'posts';

    //primary key
    public $primaryKey = 'id';

    //timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsto('App\User');
    }
}
