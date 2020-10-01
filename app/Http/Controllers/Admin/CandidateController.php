<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Services\Admin\CandidateService;

class CandidateController extends Controller
{
    private $candidateService;

    /**
     * __construct
     * @param CandidateService $candidateService
     */
    public function __construct(CandidateService $candidateService)
    {
        $this->candidateService =$candidateService;
    }
    
    /**
     * index
     * @return view
     */
    public function index()
    {
    	$listCandidate = $this->candidateService->getAllCandidate();
    	return view('admin.candidate.list_candidate', compact('listCandidate'));
    }

    /**
     * edit candidate
     * @param  int $id
     * @return
     */
    public function editCandidate($id)
    {
    	$editCandidate = $this->candidateService->getIdCandidate($id);
    	return view('admin.candidate.update_candidate', compact('editCandidate'));

    }

    /**
     * update candidate
     * @param  Request $request
     * @param  int  $id
     * @return
     */
    public function updateCandidate(Request $request, $id)
    {
    	$list = $this->candidateService->getIdCandidate($id);
    	if($request->status == config('constant.success')) {
    		$data['status'] = $request->status;
    		$sendmail = [
    			'email' => $list['email'],
    			'fullname' => $list['fullname'],
    			'title' => config('constant.successmail'),
    			'recruitment' =>$list['recruitment']
    		];
    		$this->candidateService->sendmailAdmin($sendmail);

    	} elseif ($request->status == config('constant.deny')) {
    		$data['status'] = $request->status;
    		$sendmail = [
    			'email' => $list['email'],
    			'fullname' => $list['fullname'],
    			'title' => config('constant.denymail'),
    			'recruitment' =>$list['recruitment']
    		];
    		$this->candidateService->sendmailAdmin($sendmail);

    	} else {
    		return redirect()->route('show-candidate');
    	}
    	$listCandidate = $list->update($data);
    	return redirect()->route('show-candidate');
    }

    /**
     * delete candidate
     * @param  int $id
     * @return
     */
    public function deleteCandidate($id)
    {
    	// File::delete('Upload/CV/' . Candidate::find($id)->filepdf);
        $this->candidateService->deletepdf($id); 
    	$this->candidateService->getdeleteCandidate($id);
    	return redirect()->route('show-candidate');

    }

}
