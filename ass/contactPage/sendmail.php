<?php
$email_to = "rg@darkrose.co.nz";

function expire($msg)
{
    echo '<p class="errnote">We are sorry, there appears to be a problem<br />';
    echo $msg . '<br />';
    echo 'Please try again</p>';
    die();
}

$name = $_POST['name'];
$senderEmail = $_POST['senderEmail'];
$subject = $_POST['subject'];
$message = $_POST['message'];


if (
    !isset($name) ||
    !isset($senderEmail) ||
    !isset($message)
) {
    expire('Some vital fields were not given data - this is suprising as the form should have told you which ones were vital. ');
}

$error_message = "";

if (!preg_match("/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $senderEmail)) {
    $error_message .= "The Email Address you entered does not appear to be valid.<br />";
}

if (!preg_match("/^[A-Za-z .\-]+$/", $name)) {
    $error_message .= 'Please use only letters in your name.<br />';
}

if (strlen($message) < 2) {
    $error_message .= 'The message you entered appears to be rather short.<br />';
}

if (strlen($message) > 200) {
    $error_message .= 'The message you entered appears to be rather long.<br />';
}

if (strlen($error_message) > 0) {
    expire($error_message);
}

function clean_string($string)
{
    $bad = array("content-type", "bcc:", "to:", "cc:", "href");

    return str_replace($bad, "", $string);
}

$name = clean_string($name);
$subject = clean_string($subject);
$message = clean_string($message);

$email_message = "Sender's name:" . $name . "\n";
$email_message .= "Message:\n--\n" . $message . "\n--\n";

$headers = 'From: ' . $senderEmail . "\r\n";
$headers .= 'Reply-To: ' . $senderEmail . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

@mail($email_to, $subject, $email_message, $headers);
?>
