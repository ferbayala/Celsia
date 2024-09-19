<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name','last_name','identification_number','date_of_birth','phone','email','identification_option_id'];
    
    public function identificationOption()
    {
        return $this->belongsTo(IdentificationOption::class);
    }

    public function customerService()
    {
        return $this->hasMany(CustomerService::class);
    }
}
