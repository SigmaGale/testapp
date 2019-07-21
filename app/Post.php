<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table
    protected $table = 'posts';
    // KEY PRIMARY
    public $primaryKey = 'id';
    // Timestamp
    public $timestamp = true;

    public function user(){
        return $this ->belongsTo('App\User','posted_by');
    }
}
