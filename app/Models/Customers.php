<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $guarded = ['*'];

    public function orders()
    {
        return $this->hasMany(Orders::class, 'user_id', 'name');
    }
}
