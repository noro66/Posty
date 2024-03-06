<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'body',
        'user_id'
    ];


    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
    public function user()
    {
      return  $this->belongsTo(User::class);
    }

    public function likes()
    {
       return $this->hasMany(Likes::class, 'post_id');
    }
}
