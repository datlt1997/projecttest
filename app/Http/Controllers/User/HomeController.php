<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterFormRequest;
use App\Models\Candidate;

class HomeController extends Controller
{
    public function index()
    {
    	return view('user.register');
    }

    public function registerForm(RegisterFormRequest $request){
    	$data = $request->all();
    	if($request->hasFile('filepdf')) {
    		$file = $request->filepdf;
    		$filepdf = time().$file.getClientOriginName();
    		$file->move('Upload/CV/'.$filepdf);
    		$data['filepdf'] = $filepdf;
    	}
        $sendmail = [
            'name' => $data['fullname'],
            'email' => $data['email']
        ]
    	
    	Candidate::create($request->all());
    	return redirect()->route('finish');
    }
}
