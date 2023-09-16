<?php
namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Roombook extends Model
{
    public $timestamps = false;
    protected $table = 'roombook';
    protected $fillable = [
        'id', 'Title', 'FName', 'LName', 'Email', 'National', 'Country', 'Phone',
        'TRoom', 'Bed', 'NRoom', 'Meal', 'cin', 'cout', 'stat', 'nodays',
    ];

    public function calculateNumberOfDays()
{
    $cinDate = new DateTime($this->cin);
    $coutDate = new DateTime($this->cout);
    $interval = $cinDate->diff($coutDate);
    $this->nodays = $interval->days;
}

}
