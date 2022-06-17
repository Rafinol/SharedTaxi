<?php

namespace App\Containers\AppSection\Order\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;

class Order extends ParentModel
{
    protected $fillable = [
        'user_id',
        'departure_address',
        'arrival_address',
        'earliest_time',
        'latest_time',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Order';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
