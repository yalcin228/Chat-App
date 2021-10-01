<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalMessage extends Model
{
    use HasFactory;

    protected $table="personal_message";
    protected $primaryKey = "id";
    protected $guarded=[];
}
