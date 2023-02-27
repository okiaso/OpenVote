<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Candidate extends Model
{
    use HasFactory, HasUuids, Mediable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'slug', 'code', 'sloggan',
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function voters()
    {
        return $this->hasMany(Voter::class);
    }
}
