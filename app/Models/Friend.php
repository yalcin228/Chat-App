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
    public function scopeMyFriends($query)
    {
        return $query->where('status',1)
                     ->where('from_id',user()->id)
                     ->orWhere('to_id',user()->id);
    }
    public function scopeRequestFriend($query,$id)
    {
        return $query->where('from_id',$id)
                     ->where('to_id',user()->id);
    }
    public function scopeFriendRequest($query,$id)
    {
        return $query->where('to_id',$id)->where('from_id',user()->id);
    }
    public function scopeCheckFriendRequest($query,$to_id)
    {
        $from_id=user()->id;
        return $query->orWhere(function($query) use($from_id, $to_id){
            return $query->where([
                'from_id' => $to_id,
                'to_id'=> $from_id
             ]);
        });
    }
    
   

}
