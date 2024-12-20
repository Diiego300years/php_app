<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'points'];

    // Dodaj punkty użytkownikowi
    public function addPoints(int $points)
    {
        $this->points += $points;
        $this->save();
    }

    // Odejmij punkty użytkownikowi
    public function removePoints(int $points)
    {
        $this->points -= $points;
        $this->save();
    }
}
