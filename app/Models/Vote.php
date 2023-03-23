<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        '',
    ];

    public function voter()
    {
        return $this->hasOne(Voter::class);
    }

    public function party()
    {
        return $this->hasOne(Party::class);
    }

    public function candidate()
    {
        return $this->hasOne(Candidate::class);
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }
}
