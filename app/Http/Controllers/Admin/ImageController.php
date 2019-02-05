<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
       // for ($i=0; $i <2; $i++) { 
           
          
            print_r($request->image);
            $path = $request->file('image')[0]->store('uploads', 'public');
          if (isset($request->file('image')[1])) {
              $path = $request->file('image')[1]->store('uploads', 'public');
          
          }
            
      //  }
        return view('admin.image.add', ['path' => $path]);

    }  
    
}
