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

    public function scopeCheckPersonalMessage($query,$id){
        return $query->orWhere(function($query) use($id){
            return $query->where([
                'from_id'=>$id,
                'to_id'=>user()->id
            ]);
        });
    }

    public function scopePersonalMessage($query,$id)
    {
        return $query->where([
            'from_id'=>user()->id,
            'to_id'=>$id
        ]);
    }
}
