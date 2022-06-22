<?php

namespace App\Containers\AppSection\Drive\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Drive extends ParentModel
{
    const CREATED_STATUS = 'created';
    const FINISHED_STATUS = 'finished';

    protected $fillable = [
        'price',
        'status',
        'car_number',
        'car_model',
        'car_color',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Drive';

    public function points()
    {
        return $this->hasMany(DrivePoint::class);
    }

    public function pointsSortByPosition()
    {
        return $this->hasMany(DrivePoint::class)->orderBy('position');
    }

    public function setPrice(int $price) :void
    {
        $this->price = $price;
        $this->save();
    }
}
