<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory,Sluggable;
    protected $guarded=['id'];
    public function position(){
        return $this->belongsTo(position::class);
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function sluggable(): array
{
    return [
        'slug' => [
            // title adalah nama field di tabel post di db
            'source' => 'name'
        ]
    ];
}
}
