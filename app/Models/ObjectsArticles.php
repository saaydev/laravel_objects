<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectsArticles extends Model
{
    use HasFactory;
    protected $fillable = [
        'object_id',
        'title',
    ];
    public function object(){
        return $this->hasOne("App\Models\Objects", "id", "object_id");
    }
    public function get_object(){
        return $this->object()->get();
    }
    public function type(){
        return $this->get_object()->type;
    }
}
