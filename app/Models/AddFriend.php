<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AddFriend extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'to_user', 'status'];
    protected $table="addfriend";
    protected $primaryKey = "id";
    protected $guarded=[];

}
