<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    /**
    * CATEGORY ATTRIBUTES
    * $this->attributes['id'] - int - contains the user primary key (id)
    * $this->attributes['description'] - string - contains the category description
    * $this->getProducts() - Products - contains the associated products
    */

    protected $fillable = [
        'description',
    ];

    public static function validate(Request $request){
        $validations = [
            'description' => ['required','string' ,'max:255']
        ];

        return $request->validate($validations);
    }

    public function setDescription($description) {
        $this->attributes['description'] = $description;
    }

    public function getDescription() {
        return $this->attributes['description'];
    }

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function getProducts() {
        return $this->products;
    }

    public function setProducts($products) {
        return $this->products = $products;
    }
}
