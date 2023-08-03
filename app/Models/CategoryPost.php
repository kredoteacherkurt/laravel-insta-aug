<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = "category_post"; //connecting model and table manually
    public $timestamps = false; // when you remove $table->timestamps()
    protected $fillable = ["post_id", "category_id"]; // table will accept an array data

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
