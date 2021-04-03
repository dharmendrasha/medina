<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product\MainProductModel;

class ProductVarient extends Model
{
    use HasFactory;
    protected $table = "product_varient";
    protected $fillable = ['product_id', 'stock', 'price', 'color', 'size'];

    protected $appends = [
        'product'
    ];

    /**
     * this will return the product of this varients
     */

    function getProductAttribute(){
        return $this->hasOne(MainProductModel::class, 'product_id', 'id');
    }

}
