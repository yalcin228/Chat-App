<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddFriend extends Model
{
    use HasFactory;

    protected $table="addfriend";
    protected $primaryKey = "id";
    protected $guarded=[];

   
}
