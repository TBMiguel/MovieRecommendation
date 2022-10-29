<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name', 
        'year', 
        'image', 
        'classification', 
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function recommendations(){
        return $this->hasMany(Recommendation::class)
                    ->where('user_id', auth()->user()->id);
    }

    public function allrecommendations(){
        return $this->hasMany(Recommendation::class);
    }

    public function norecommendations(){
        return $this->hasMany(NoRecommendation::class)
                    ->where('user_id', auth()->user()->id);
    }

    public function allnorecommendations(){
        return $this->hasMany(NoRecommendation::class);
    }

    public function follow(){
        return $this->hasMany(FollowPost::class)
                    ->where('user_id', auth()->user()->id);
    }

    public function unfollow(){
        return $this->hasMany(FollowPost::class);
    }
}
