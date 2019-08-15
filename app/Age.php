<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    // created_at,update_atを使用しないため、timestampsを無効に
    public $timestamps = false;
}
