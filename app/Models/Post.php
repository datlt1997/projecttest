<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table= 'posts';

    protected $fillable = [
    	'user_id', 'author', 'title', 'content', 'status'
    ];

    /**
     * one to many with user
     */
    public function user(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    /**
     * scope keyword
     * @param  array $query 
     * @param  string $key   
     * @return array    select post with keyword  
     */
    public function scopeKeywordpost($query, $key)
    {
    	return $query->where('title', 'like', '%' . $key . '%')
                    ->orWhere('author', 'like', '%' . $key . '%');
    }

    /**
     * scope select post
     * @param  array $query
     * @param  string $select
     * @return array select post with status
     */
    public function scopeSelectpost($query, $select)
    {
    	return $query->where('status', '=', $select);
    }
}
