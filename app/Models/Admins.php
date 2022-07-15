<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    use HasFactory;
    protected $table = 'admins';

    protected $guarded = ['*'];

    public function orders()
    {
        return $this->hasMany(Orders::class, 'user_id', 'id');
    }
}
