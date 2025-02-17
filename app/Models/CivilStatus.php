<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CivilStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'civil_status',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class);
    }
    public function taggedAndValidatedApplicants(): HasMany
    {
        return $this->hasMany(TaggedAndValidatedApplicant::class);
    }
    public function dependents(): HasMany
    {
        return $this->hasMany(Dependent::class);
    }
}
