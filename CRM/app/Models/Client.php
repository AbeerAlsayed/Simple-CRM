<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Client extends Model
{
    public $fillable=['name','vat','address','status'];

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
