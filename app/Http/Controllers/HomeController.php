<?php

namespace App\Http\Controllers;

use App\Facades\Parser;
use App\Models\Template;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
    }

    public function saveTemplate(Request $request)
    {   
        Template::create($request->all());
        return ['message' => 'Stored!'];
    }

    public function getTemplates()
    {
        return Template::all();
    }
}
