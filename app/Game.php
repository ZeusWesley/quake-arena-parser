<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'total_kills'];

    public function players() {
        return $this->hasMany(Player::class, 'game_id', 'id');
    }

    public function kills() {
        return $this->hasMany(Kill::class, 'game_id', 'id');
    }
}
