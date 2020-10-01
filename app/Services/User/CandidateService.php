<?php 

namespace App\Services\User;

use Mail;
use App\Mail\emailConfirmation;
use App\Models\Candidate;

class CandidateService {

	/**
	 * getSaveCandidate
	 * @param  array $data
	 * @return
	 */
	public function getSaveCandidate($data)
	{
		return Candidate::create($data);
	}

	/**
	 * sendMailConfirm
	 * @param  array $sendmail 
	 * @return mail
	 */
	public function sendMailConfirm($sendmail)
	{
		return Mail::to($sendmail['email'])->send(new emailConfirmation($sendmail));
	}

}
?>