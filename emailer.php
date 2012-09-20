
<?php

  require_once( './phpmailer/class.phpmailer.php' );

  foreach( $_POST as $k=>$v ) {
    if(ini_get('magic_quotes_gpc'))
    $_POST[$k]=stripslashes($_POST[$k]);
    
    $_POST[$k]=htmlspecialchars(strip_tags($_POST[$k]));
  }

  $invalid_request = empty( $_POST[ "name"] ) || empty( $_POST[ "email" ] );

  if ( $invalid_request ) {

    echo "You're not supposed to be here...";

  }
  else {

    $name = $_POST[ "name" ];
    $email = $_POST[ "email" ];
    $age = empty( $_POST[ "age" ] ) ? "*Not Specified*" : $_POST[ "age" ];
    $diagnosis = empty( $_POST[ "diagnosis" ] ) ? "*Not Specified*" : $_POST[ "diagnosis" ];
    $needs = empty( $_POST[ "needs" ] ) ? "*Not Specified*" : $_POST[ "needs" ];
    $intervention = $_POST[ "intervention" ];
    $aba =  $_POST[ "aba" ];
    $referer = empty( $_POST[ "referer" ] ) ? "*Not Specified*" : $_POST[ "referer" ];

    $message = "<p>Name: " . $name . "</p>" .
      "<p>Email: " . $email . "</p>" .
      "<p>Age: " . $age . "</p>" .
      "<p>Diagnosis: " . $diagnosis . "</p>" .
      "<p>Needs: " . $needs . "</p>" .
      "<p>Intervention: " . $intervention . "</p>" .
      "<p>ABA: " . $aba . "</p>" .
      "<p>Referer: " . $referer . "</p>";

    $mail = new PHPMailer(); //true to output debug
    $mail->IsSMTP();

    try {
      $mail->Host       = "ssl://smtp.gmail.com";
      $mail->SMTPDebug  = 1;
      $mail->SMTPAuth   = true;
      $mail->Host       = "ssl://smtp.gmail.com";
      $mail->Port       = 465;
      $mail->Username   = "bmadrid@spectrumprek.com";
      $mail->Password   = "TEAMSPECTRUM2012";
      $mail->AddAddress( "contact@spectrumprek.com", "Survey" );
      $mail->SetFrom( "contact@spectrumprek.com" , "Survey" );
      $mail->Subject = '[Survey] from ' . $name;
      $mail->MsgHTML($message);
      $mail->Send();

    } catch (phpmailerException $e) {
      echo $e->errorMessage();
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
?>