<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the product name
     * $this->attributes['price'] - int - contains the product price
     * $this->attributes['color'] - string - the color of the product
     * $this->attributes['price'] - string - the size of the product
     * $this->attributes['quantity_in_stock'] - number - the number of available products in stock
     * $this->items - Item[] - contains the associated items
     * $this->category - Category - the category associated to this product
     */

    protected $fillable = [
        'name',
        'description',
        'price',
        'color',
        'size',
        'quantity_in_stock',
        'category_id'
    ];

    public static function validate(Request $request)
    {
        $rules = [
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            "image" => "required|image",
            "color" => "required",
            "size" => "required",
            "quantity_in_stock" => "required",
            "category_id" => "required"
        ];
        $request->validate($rules);
    }

    public static function sumPricesByQuantities($products, $productsInSession)
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }
        return $total;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getSize()
    {
        return $this->attributes['size'];
    }

    public function setSize($size)
    {
        $this->attributes['size'] = $size;
    }

    public function getColor()
    {
        return $this->attributes['color'];
    }

    public function setColor($color)
    {
        $this->attributes['color'] = $color;
    }

    public function getQuantityInStock()
    {
        return $this->attributes['quantity_in_stock'];
    }

    public function setQuantityInStock($quantityInStock)
    {
        $this->attributes['quantity_in_stock'] = $quantityInStock;
    }

    public function getDescription()
    {
        return $this->attributes['description'] ;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
}
