<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }


    public function patientdata(): hasMany
    {
        return $this->hasMany(PatientData::class);
    }


    public function dentalcases(): hasMany
    {
        return $this->hasMany(Dentalcase::class);
    }


}
