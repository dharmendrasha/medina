<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product\ProductVarient;

class MainProductModel extends Model
{
    use HasFactory;

    protected $table = "product";
    protected $fillable = ['name', 'description'];

    protected $appends = [
        'varients'
    ];

    /**
     * this will return the product varients this is a relations ship to product varients
     */

    function getVarientsAttribute(){
        return $this->hasMany(ProductVarient::class, 'id', 'product_id');
    }



}
