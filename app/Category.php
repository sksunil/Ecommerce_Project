<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @return array
     */
    protected $fillable = ['name','id'];
    public  function products()
    {
       // return $this->hasMany(App\product);
        return $this->hasMany(Product::class);
    }
}
