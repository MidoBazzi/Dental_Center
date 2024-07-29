<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function dentalcases(): hasMany
    {
        return $this->hasMany(Dentalcase::class);
    }
    public function doctorpayments(): hasMany
    {
        return $this->hasMany(DoctorPayment::class);
    }
}
