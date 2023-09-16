<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
     public $timestamps = false;
    protected $table = 'payment';
    protected $fillable = [
        'id', 'title', 'fname', 'lname', 'troom', 'tbed', 'nroom', 'cin', 'cout',
        'ttot', 'fintot', 'mepr', 'meal', 'btpt', 'noofdays',
    ];

    public static function getPaymentChartData()
{
    $payments = Payment::all();
    $chart_data = [];

    foreach ($payments as $payment) {
        $chart_data[] = [
            'date' => $payment->cout,
            'profit' => $payment->fintot * 10 / 100,
        ];
    }

    return $chart_data;
}

}
