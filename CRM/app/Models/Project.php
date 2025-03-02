<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }


    public $fillable=['title','description','deadline','user_id','client_id','status'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at', // إذا كنت تستخدم SoftDeletes
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
