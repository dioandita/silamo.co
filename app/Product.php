<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'name','deskripsi','berat','qty','id_kategori','image','price',
    ];
    public function kategoris()
    {
        return $this->belongsTo('App\Kategori','id_kategori');
    }
}
