<?php

namespace App\Models;

use App\Traits\HasFormattedDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes,HasFactory,HasFormattedDates;

    public $fillable = ['title', 'description', 'deadline', 'status', 'assigned_user_id', 'assigned_client_id'];

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    public function assignedClient()
    {
        return $this->belongsTo(Client::class, 'assigned_client_id');
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
