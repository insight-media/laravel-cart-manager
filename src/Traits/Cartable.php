<?php

namespace Freshbitsweb\LaravelCartManager\Traits;

trait Cartable
{
    /**
     * Adds an item to the cart.
     *
     * @param int Identifier
     * @param int quantity
     * @return
     */
    public static function addToCart($id, $quantity = 1)
    {
        $class = static::class;

        return app(config('cart_manager.cart_class'))->add($class::findOrFail($id), $quantity);
    }
}
