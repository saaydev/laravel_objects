<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objects extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'type',
    ];

    public function get_permalink(bool $isAdmin = true){
        return url($this->type);
    }
    public function items(){
        return $this->hasMany("\App\Models\ObjectsArticles", "object_id");
    }
    public function get_items(){
        return $this->items()->get();
    }
}
