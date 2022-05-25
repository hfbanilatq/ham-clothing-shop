<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    /**
     * Discount ATTRIBUTES
     * $this->attributes['id'] - int - contains the discount primary key (id)
     * $this->attributes['discount_percent'] - floar - contains the percent-discount between 0 and 1
     * $this->attributes['cant_available'] - integer - contains the available products can be use this discount
     * $this->attributes['available'] - boolean - contains if the discount is available to use
     * $this->attributes['expires_in'] - DateTime - contains the date when this discount expires
     * $this->attributes['created_at'] - DateTime - the date when the discount was created
     * $this->attributes['updated_at'] - DateTime - the last update date
     * $this->getUser() - User - the discount's owner
     */

    protected $fillable = [
        'discount_percent',
        'cant_available',
        'available',
        'expires_in',
        'user_id'
    ];

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setDiscountPercent($discountPercent)
    {
        $this->attributes['discount_percent'] = $discountPercent;
    }

    public function getDiscountPercent()
    {
        return $this->attributes['id'];
    }

    public function setCantAvailable($cantAvailable)
    {
        $this->attributes['cant_available'] = $cantAvailable;
    }

    public function getCantAvailable()
    {
        return $this->attributes['cant_available'];
    }

    public function setAvailable($available)
    {
        $this->attributes['available'] = $available;
    }

    public function isAvailable()
    {
        return $this->attributes['available'];
    }

    public function setExpiresIn($expiresIn)
    {
        $this->attributes['expires_in'] = $expiresIn;
    }

    public function getExpiresIn()
    {
        return $this->attributes['expires_in'];
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setUserId($id)
    {
        $this->attributes['user_id'] = $id;
    }

    public function getUser()
    {
        return $this->user;
    }
    
}
