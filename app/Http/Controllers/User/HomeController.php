<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterFormRequest;
use App\Models\Candidate;
use App\Services\User\CandidateService;
use Mail;
use App\Mail\emailConfirmation;

class HomeController extends Controller
{


    private $candidateservice;

    /**
     * __construct
     * @param CandidateService $candidateservice
     */
    public function __construct(CandidateService $candidateservice) 
    {
        $this->candidateservice = $candidateservice;
    }

    /**
     * index register
     * 
     */
    public function index()
    {
    	return view('user.register');
    }

    /**
     * registerForm
     * @param  RegisterFormRequest $request
     * @return
     */
    public function registerForm(RegisterFormRequest $request){
    	$data = $request->all();
    	if($request->hasFile('filepdf')) {
    		$file = $request->filepdf;
    		$filepdf = time() . $file->getClientOriginalName();
    		$file->move('Upload/CV/', $filepdf);
    		$data['filepdf'] = $filepdf;
    	}
        $data['status'] = config('constant.send');
    	$sendmail = [
    		'email' => $data['email'],
    		'fullname' => $data['fullname'],
    		'title' => config('constant.confirmmail'),
    		'recruitment' =>$data['recruitment']
    	];
    	$this->candidateservice->getSaveCandidate($data);
        $this->candidateservice->sendMailConfirm($sendmail);
    	return redirect()->back()->with('message', 'Đã gửi thành công');
    }
}