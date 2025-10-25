<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'logs';
    protected $primaryKey = 'log_id';

    protected $fillable = [
        'user_id', 'activities', 'ip_address',
    ];
}
