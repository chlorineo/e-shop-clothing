<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model {
    protected $fillable = [
        'user_id',
        'delivery_method',
        'payment_method',
        'total_price',
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'street',
        'city',
        'zip_code'
    ];

    protected function casts(): array {
        return ['total_price' => 'decimal:2'];
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany {
        return $this->hasMany(OrderItem::class);
    }
}
