<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    // protected $fillable = ['title', 'category', 'details'];

    public function scopeFilter($query, array $filters)
    {
       //dd($category);
        if($filters['category'] ?? false) {
            return $query->where('category', 'LIKE',  '%' . request('category') . '%');
        }

        if($filters['search'] ?? false) {
            return $query->where('title', 'LIKE',  '%' . request('search') . '%')
            ->orWhere('details', 'LIKE',  '%' . request('search') . '%')
            ->orWhere('category', 'LIKE',  '%' . request('search') . '%');

        }
    }

    // for check if user has liked this post
    public function isLikedByUser()
    {
        return (bool) $this->likes->where('user_id', auth()->id())->count();
       // return $this->likes->contains('user_id', $user->id);
    }
    // relationship with user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // relationship with likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
 
}