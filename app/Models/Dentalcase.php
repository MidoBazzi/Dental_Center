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

    public function patients(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctors(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }


    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }


    public function patientdata(): hasMany
    {
        return $this->hasMany(PatientData::class);
    }

    public function payments(): hasMany
    {
        return $this->hasMany(Payment::class);
    }
}
