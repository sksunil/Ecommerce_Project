<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     *
     */
    protected $fillable=['name','description','size','price','category_id','image'];
    public function catogory()
    {
        return $this->belongsTo(Categoty::class);
    }
}
