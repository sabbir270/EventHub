<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
    {
        use HasFactory;

        public function event()
        {
            return $this->belongsTo(Event::class);
        }

        public function attendee()
        {
            return $this->belongsTo(User::class, 'attendee_id');
        }
}
