<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Publication extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['image'] - string - contains image url
     * $this->attributes['description'] - string - contains the publication optional commentary
     * $this->user - User[] - contains the associated user
     * $this->product - Product[] - contains the associated product
     */

    protected $fillable = [
        'image',
        'user_id',
        'product_id'
    ];

    public static function validate(Request $request)
    {
        $rules = [
            "image" => "required|image"
        ];
        $request->validate($rules);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUserId($id) {
        $this->attributes['user_id'] = $id;
    }

    public function product()
    {
        return $this->belongsTo(User::class);
    }

    public function setProduct($user)
    {
        $this->user = $user;
    }

    public function getProduct()
    {
        return $this->user;
    }

    public function setProductId($id) {
        $this->attributes['product_id'] = $id;
    }


}
