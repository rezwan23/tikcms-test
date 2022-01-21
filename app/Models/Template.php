<?php

namespace App\Models;

use App\Facades\Parser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'template', 'style'];


    public function setTemplateAttribute($value)
    {
        $this->attributes['template'] = Parser::parse(request()->style, $value);
    }
}
