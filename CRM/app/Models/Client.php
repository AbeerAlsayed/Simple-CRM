<?php

namespace App\Models;

use App\Traits\HasFormattedDates;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Client extends Model
{
    use SoftDeletes,HasFactory,HasFormattedDates;

    public $fillable=['name','vat','address','email','phone'];

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
