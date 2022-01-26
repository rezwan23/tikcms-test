<?php

namespace App\Http\Controllers;

use App\Facades\Parser;
use App\Models\Image;
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

    public function getImages()
    {
        return Image::all();
    }


    public function saveImages(Request $request)
    {
        // $request->validate(['files.*' => 'image|required']);

        $images = [];

        if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                if(is_file($file)){
                    $image = storeFile($file);
                    Image::create(compact('image'));
                    array_push($images, asset('uploads/'.$image));
                }
            }
        }

        return response(['message' => 'Image uploaded', 'images' => $images ]);
        
    }
}
