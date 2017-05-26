<?php

  $db = new Connection();
  $name = $db->escape($_POST['name']);
  $surname = $db->escape($_POST['surname']);
  $email = $db->escape($_POST['email']);
  $pass = Func::encrypt($_POST['pass']);
  $birthdate = $_POST['birthdate'];
  $phone = $_POST['phone'];
  $sql = $db->query("SELECT idUser FROM Users WHERE email='$email' LIMIT 1;");
  if($db->rows($sql) > 0) {
    echo 'El mail ingresado corresponde a un usuario existente.';
  } else {
    $keyreg = md5(time());
    $link = URL . '?view=activate&key=' . $keyreg;
    /*
    $mail = new PHPMailer;
    $mail->CharSet = "UTF-8";
    $mail->Encoding = "quoted-printable";
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = PHPMAILER_HOST;                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = PHPMAILER_USER;                     // SMTP username
    $mail->Password = PHPMAILER_PASS;                     // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Port = PHPMAILER_PORT;                          // TCP port to connect to
    $mail->setFrom(PHPMAILER_USER, APP_TITLE);             // Quien manda el correo?
    $mail->addAddress($email, $name);                      // A quien le llega
    $mail->isHTML(true);                                   // Set email format to HTML
    $mail->Subject = 'Activación de tu cuenta';
    $mail->Body    = EmailTemplate($name,$link);
    $mail->AltBody = 'Hola ' . $name . ' para activar tu cuenta accede al siguiente elance: ' . $link;
    if(!$mail->send()) {
      echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    } else {
    */
      $reg_date = date('Y/m/d', time());
      $values = array(
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'password' => $pass,
        'keyreg' => $keyreg,
        'registrationDate' => $reg_date,
        'phone' => $phone,
        'birthdate' => $birthdate,
        'credits' => 50,
        'points' => 50
      );
      $db->insert("Users", $values);
      $sql = $db->query("SELECT MAX(idUser) AS idUser FROM Users;");
      $data = $db->fetch_array($sql);
      (new Sessions)->generateSession($data[0]['idUser']);
      echo 1;
    //}
  }

?>
