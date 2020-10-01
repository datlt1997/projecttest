<?php 

namespace App\Services\Admin;

use Mail;
use App\Mail\emailConfirmation;
use App\Models\Candidate;
use File;

class CandidateService {

	/**
	 * get all candidate
	 * @return 
	 */
	public function getAllCandidate()
	{
		return Candidate::paginate(config('constant.paginate'));
	}

	/**
	 * get id candidate
	 * @param  int $id
	 * @return 
	 */
	public function getIdCandidate($id)
	{
		return Candidate::find($id);
	}

	/**
	 * get delete candidate
	 * @param  int $id
	 * @return
	 */
	public function getdeleteCandidate($id)
	{
		return Candidate::destroy($id);
	}

	/**
	 * delete pdf
	 * @param  int $id
	 * @return
	 */
	public function deletepdf($id)
	{
		File::delete('Upload/CV/' . Candidate::find($id)->filepdf);
	}

	/**
	 * send mail
	 * @param  array $sendmail
	 * @return
	 */
	public function sendmailAdmin($sendmail)
	{
		Mail::to($sendmail['email'])->send(new emailConfirmation($sendmail));
	}

}
?>