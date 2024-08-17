<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $table = "post";

    protected $fillable = ['caption', 'image','tanggal', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function komen()
    {
        return $this->hasMany(User::class);
    }
}
