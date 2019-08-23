<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Phpmailer
{	


	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}
	public function send_mail($to, $msg_body)
	{

		$mail = new PHPMailer\PHPMailer\PHPMailer;
		
		$mail->setFrom('from@example.com', 'First Last');
		$mail->addAddress($to);		
		$mail->Subject = 'Ecom - Email';
		$mail->msgHTML($msg_body);
		
		if (!$mail->send()) {
		    return "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    return true;
		}


	}
	

}

/* End of file Phpmailer.php */
/* Location: ./application/libraries/Phpmailer.php */
