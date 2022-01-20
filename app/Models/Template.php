<?php

namespace App\Models;

use App\Facades\Parser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'template', 'style'];


    public function setStyleAttribute($value)
    {
        $this->attributes['style'] = serialize(Parser::parse($value));
    }
}
