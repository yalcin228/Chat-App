<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;


class PersonalMessage extends Model
{
    use HasFactory;

    protected $table="personal_message";
    protected $primaryKey = "id";
    protected $guarded=[];

    public function getUser()
	{
		return $this->belongsTo(User::class,'to_id');
	}
}
