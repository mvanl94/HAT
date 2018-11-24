<?php

namespace App\Models;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    use FormAccessible;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','naam', 'adres', 'postcode', 'telefoon', 'email',
        'ervaring', 'schaal', 'salarisnummer', 'beschikbaar_vanaf', 'beschikbaar_tot',
        'beschikbaarheid', 'indeling'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['publish_at', 'unpublish_at' ];

    public function isAvailable($date, $dagdeel)
    {
        $availability = collect(json_decode($this->beschikbaarheid));

        $day = new \DateTime($date);
        $day = $day->format('l');

        if ($availability[$day]->$dagdeel== '1') {

            $ingepland = collect(json_decode($this->ingepland));

            if ($ingepland->has($date)) {
                $status = $ingepland->get($date)->$dagdeel;
                if ($status == '1' | $status == '') {
                    return true;
                }
                return false;
            }
            return true;
        }

        return false;
    }
}
