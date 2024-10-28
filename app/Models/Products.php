<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = "products";

    protected $fillable = [
        "name",
        "category",
        "description",
        "images",
        "date_time"
    ];

    protected $dates = ["created_at", "updated_at"];

    public $timestamp = false;
}
