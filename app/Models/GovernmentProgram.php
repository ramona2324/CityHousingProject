<?php

namespace App\Models;

use App\Models\Shelter\ProfiledTaggedApplicant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GovernmentProgram extends Model
{
//    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'program_name',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function profiledTaggedApplicant(): HasMany
    {
        return $this->hasMany(ProfiledTaggedApplicant::class);
    }
}
