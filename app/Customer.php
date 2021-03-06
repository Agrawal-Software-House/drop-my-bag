<?php

namespace App;

use App\Models\customer_address;
use App\Models\customer_wishlist;
use App\Models\customer_cart;
use App\Models\customer_transaction;
use App\Notifications\CustomerResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number', 
        'email', 
        'gender',
        'city',
        'state_id',
        'zip', 
        'password',
        'terms_condition',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPassword($token));
    }

    public function address()
    {
        return $this->hasMany(customer_address::class);
    }

    public function wishlist()
    {
        return $this->hasMany(customer_wishlist::class);
    }

    public function cart()
    {
        return $this->hasMany(customer_cart::class);
    }

    public function transactions()
    {
        return $this->hasMany(customer_transaction::class);
    }

    
}
