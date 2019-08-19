<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['fullname', 'gender', 'age_id', 'email', 'is_send_email', 'feedback'];
}
