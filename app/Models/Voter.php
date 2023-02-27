<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Voter extends Model
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

    public function vote()
    {
        return $this->hasOne(Vote::class);
    }

    public function election()
    {
        return $this->hasOne(Election::class);
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
