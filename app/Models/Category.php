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
     * $this->attributes['created_at'] - DateTime - the date when the category was created
     * $this->attributes['updated_at'] - DateTime - the last update date
     */

    protected $fillable = [
        'description',
    ];

    public static function validate(Request $request)
    {
        $validations = [
            'description' => ['required', 'string', 'max:255']
        ];

        return $request->validate($validations);
    }


    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        return $this->products = $products;
    }
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
}
