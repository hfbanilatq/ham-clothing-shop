<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Nette\Utils\ArrayList;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['lastname'] - string - contains the user lastname
     * $this->attributes['document_number'] - unsignedBigInt - contains the user document number
     * $this->attributes['email'] - string - contains the user email
     * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['remember_token'] - string - contains the user password
     * $this->attributes['role'] - string - contains the user role (client or admin)
     * $this->attributes['balance'] - int - contains the user balance
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     * $this->getOrders - Order[] - contains the associated orders
     * $this->getGoals - Goal[] - contains the associated goals
     * $this->getPublications - Publication[] - contains the associated publications
     * $this->getDiscounts - Discount[] - contains the associated discount
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'document_number',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function getLastname()
    {
        return $this->attributes['lastname'];
    }

    public function setLastname($lastname)
    {
        $this->attributes['lastname'] = $lastname;
    }

    public function getDocumentNumber()
    {
        return $this->attributes['document_number'];
    }

    public function setDocumentNumber($documentNumber)
    {
        $this->attributes['document_number'] = $documentNumber;
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword()
    {
        return $this->attributes['password'];
    }

    public function setPassword($password)
    {
        $this->attributes['password'] = $password;
    }

    public function getRole()
    {
        return $this->attributes['role'];
    }

    public function setRole($role)
    {
        $this->attributes['role'] = $role;
    }

    public function isAdmin()
    {
        return $this->getRole() === 'admin';
    }

    public function getBalance()
    {
        return $this->attributes['balance'];
    }

    public function setBalance($balance)
    {
        $this->attributes['balance'] = $balance;
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

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders()
    {
        return $this->orders;
    }

    public function setOrders($orders)
    {
        $this->orders = $orders;
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function getGoals()
    {
        return $this->goals;
    }

    public function setGoals($goals)
    {
        $this->goals = $goals;
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function getPublications()
    {
        return $this->publications;
    }

    public function setPublications($publications)
    {
        $this->publications = $publications;
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function getDiscounts()
    {
        return $this->discounts;
    }

    public function setDiscounts($discounts)
    {
        $this->discounts = $discounts;
    }
}
