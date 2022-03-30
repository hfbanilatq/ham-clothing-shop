<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
