<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'customer_services';

    protected $fillable = ['initial_date','last_billing','last_pay','customer_id','service_option_id'];

    public function serviceOption()
    {
        return $this->belongsTo(ServiceOption::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
