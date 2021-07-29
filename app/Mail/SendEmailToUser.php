<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ErpPatientTest;
use DB;
use App\User;


class SendEmailToUser extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
     
    
        $users_details = User::where('id', $this->mailData['receiver_id'])->first();

     // Array for Blade
     $input = array(
      'name'     => $users_details->name,
     
  
     );

     // $total_price_with_nurse = '';
     // $patient_id = $this->mailData['patient_id'];
     // $emailBody = EmailSetting::where('id', 1)->first();
     
  

     return $this->subject('From EDMS')->view('emails.SendEmailToUser')
     ->with([
        'inputs' => $input,
        // 'emailBody' => $emailBody->email_body,
        // 'total_price' => (int)$total_prices->SUM_PRICE+35,
    ]);
 }
}
