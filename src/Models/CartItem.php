<?php

namespace Freshbitsweb\LaravelCartManager\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart_id', 'model_type', 'model_id', 'name', 'price', 'image', 'quantity',
    ];

    protected $with = ['cartable'];

    /**
     * This method is put to convert snake case in camelCase.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'modelType' => $this->model_type,
            'modelId' => $this->model_id,
            'name' => $this->name,
            'price' => $this->price,
            'image' => $this->image,
            'quantity' => $this->quantity,
            'cartable' => $this->cartable,
        ];
    }


    /**
     * Get the original cartable model.
     *
     * @return hasOne
     */
    public function cartable()
    {
        return $this->morphTo(null, 'model_type', 'model_id');
    }
}
