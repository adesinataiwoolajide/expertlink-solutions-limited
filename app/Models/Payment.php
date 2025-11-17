<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $table = 'payments';
    protected $primaryKey = 'id';

    protected $fillable = [
        'userSlug', 'slug', 'totalAmount', 'paymentMethod', 'currencyCode', 'paymentDescription', 'transactionReference', 'paymentReference', 'paymentStatus', 'paymentProvider'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userSlug', 'slug');
    }
}
