<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postingan extends Model
{
    use HasFactory,Sluggable;
    protected $guarded=['id'];

    public function Kategori(){
        return $this->belongsTo(Kategori::class);
    }
   public function User(){
   return $this->belongsTo(User::class);
  }
  // method dibawah ini berfungsi untuk supaya saat menggunakan route model binding parameter pencarian diubah dari id ke slug dengan cara return 'slug'
public function getRouteKeyName()
{
return 'slug';
}
// untuk slugable otomatis
public function sluggable(): array
{
    return [
        'slug' => [
            // title adalah nama field di tabel post di db
            'source' => 'title'
        ]
    ];
}
}
