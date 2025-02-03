<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopCard extends Model
{
    protected $table = "shopcard";
    protected $hidden = ["created_at","updated_at"];
    use HasFactory;
}
