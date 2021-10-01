<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = ['from_id', 'to_id', 'status'];
    protected $guarded=[];

    
    public function user()
    {
        return $this->belongsTo(User::class,'from_id','id');
    }
    public function user_to()
    {
        return $this->belongsTo(User::class,'to_id','id');
    }
   

}
