<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $guarded = ['*'];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'user_id', 'id');
    }
}
