<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperOrderStatusHistory
 */
class OrderStatusHistory extends Model
{
    protected $table = "order_status_history";
    protected $fillable = [
        'order_id',
        'status',
        'notes',
        'changed_by',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // Relationships
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function changedBy(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'changed_by');
    }
}
