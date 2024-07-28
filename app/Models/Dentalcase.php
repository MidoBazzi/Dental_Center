<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Dentalcase extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }


    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }


    public function patientdatas(): hasMany
    {
        return $this->hasMany(PatientData::class);
    }

    public function payments(): hasMany
    {
        return $this->hasMany(Payment::class);
    }
}
