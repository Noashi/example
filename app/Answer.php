<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;
    
    protected $table = 'Answers';
    protected $guarded = array('id');
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    
    protected $fillable = ['fullname', 'gender', 'age_id', 'email', 'is_sent_email', 'feedback',];
}
