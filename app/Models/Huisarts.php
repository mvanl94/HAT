<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huisarts extends Model
{
    protected $table = 'huisarts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'praktijknaam', 'adres', 'postcode',
        'telefoon', 'email', 'contactpersoon', 'telefoon_contactpersoon'
    ];

}
