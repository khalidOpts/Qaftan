<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    use HasFactory;
    protected $table = 'shippings';

    public function order(){
       return $this->belongsTo(orders::class);
    }
}
