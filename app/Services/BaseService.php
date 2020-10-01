<?php 

namespace App\Service;

use mail;
use App\Mail\emailComfirmation;

class BaseService {

	public function sendmail($sendmail)
	{
		Mail::to($sendmail['email'])->send(new emailConfirmation($sendmail));
	}
}
?>