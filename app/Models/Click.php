<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        "link_id",
        "user_ip",
        "user_agent"
    ];
}
