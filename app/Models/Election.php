<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Election extends Model
{
    use HasFactory, HasUuids, Mediable, Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        '',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function parties()
    {
        return $this->hasMany(Party::class);
    }

    public function voters()
    {
        return $this->hasMany(Voter::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
