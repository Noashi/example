<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'Answers';
    protected $guarded = array('id');
    public $timestamps = true;
    protected $fillable = ['fullname', 'gender', 'age_id', 'email', 'is_sent_email', 'feedback',];
}
