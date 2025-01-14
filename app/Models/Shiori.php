<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shiori extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required' ,
        'tabisaki' => 'required' ,
    );

    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
