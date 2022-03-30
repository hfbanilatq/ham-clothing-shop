<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    /**
     * GOAL ATTRIBUTES
     * $this->attributes['id'] - int - contains the goal primary key (id)
     * $this->attributes['description'] - string - contains the description of the goal
     * $this->attributes['cant_publications'] - integer - contains quantity of publications of diferents product needed to complete the goal
     * $this->attributes['activable_discount'] - float - the discount percent between 0 and 1 that will be activated after this goals is completed
     * $this->attributes['created_at'] - DateTime - the date when the goal was created
     * $this->attributes['updated_at'] - DateTime - the last update date
     * $this->getUsers() - User[] - the users completed this goal
     */

     protected $fillable = [
         'description',
         'cant_publications',
         'activable_discount'
     ];


     public function setDescription($description) {
         $this->attributes['description'] = $description;
     }

     public function getDescription() {
         return $this->attributes['description'];
     }

     public function setCantPublications($cantPublications) {
        $this->attributes['cant_publications'] = $cantPublications;
    }

    public function getCantPublications() {
        return $this->attributes['cant_publications'];
    }

    public function setActivableDiscount($activableDiscount) {
        $this->attributes['activable_discount'] = $activableDiscount;
    }

    public function getActivableDiscount() {
        return $this->attributes['activable_discount'];
    }

    public function users() 
    {
        $this->hasMany(User::class);
    }

    public function getUsers() {
        return $this->users;
    }
}
