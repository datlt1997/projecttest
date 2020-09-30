<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table="candidate";
    protected $fillable =[
    	'fullname', 'date', 'month', 'year', 'phone', 'recruitment',
    	'language', 'technical', 'specialskill', 'achievement',
    	'sixmonth', 'oneyear', 'threeyear', 'project', 'income',
    	'email', 'filepdf'
    ];
}