    <?php
        require_once "Mail/Mail.php";
    $subject = "Test mail PHP";
  $body = "Test email dengan PHP dan GMAIL !!!";
  //mail($to, $subject, $body,$headers);
  //ganti baris ini dengan email yang dituju 
  $to = "takwacool@ymail.com";
//ganti dengan emailmu /email resmi website
  $from = "yogamarz@gmail.com";
  $host = "ssl://smtp.gmail.com";
  $port = "465";
  //emailmu untuk login k gmail 
  $username = "yogamarz@gmail.com";
   
  //passwordmu waktu login gmail
  $password = "yogamarsal311095";
 
$headers = array('From' => $from, 'To' => $to, 
'Subject' => $subject);
$smtp = Mail::factory('smtp', array('host' => $host,
 'port' => $port, 'auth' => true,
 'username' => $username, 'password' => $password));
 
  $mail = $smtp -> send($to, $headers, $body);
 
if (PEAR::isError($mail)) {
echo("<p> Email Gagal dikirim" . $mail -> getMessage() . "</p>");
}else{
echo "Email berhasil di kirim ";
}
    ?>