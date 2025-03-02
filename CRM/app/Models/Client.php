<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Client extends Model
{
    use SoftDeletes;

    public $fillable=['name','vat','address'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at', // إذا كنت تستخدم SoftDeletes
    ];

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
