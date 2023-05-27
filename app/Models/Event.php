<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=[
        'title','description','start_date','location','logo','user_id'
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

}
