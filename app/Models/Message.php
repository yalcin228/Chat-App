<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;

class Message extends Model
{
    use HasFactory;

    protected $table="message";
    protected $primaryKey = "id";
    protected $guarded=[];

    public function getUser()
	{
		return $this->belongsTo(User::class,'user_id');
	}

   
}
