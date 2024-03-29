<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderProduct
 * @property Product $product
 * @property int $count
 */
class OrderProduct extends Model
{
    public $guarded = ['id'];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function color()
    {
        return $this->hasOne(Color::class, 'id','color_id');
    }

    public function size()
    {
        return $this->hasOne(Sizing::class, 'id','size_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
