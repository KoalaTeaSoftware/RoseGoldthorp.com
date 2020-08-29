<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/logging/errorHandler.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/chapters/contact/constraints.php";

//error_log("Come in to sendmail.php");
//error_log("Server:" . print_r($_SERVER, true));
//error_log("POST:" . print_r($_POST, true));
//error_log("GET:" . print_r($_GET, true));

$email_to = "goldthorpmark@gmail.com";

/** @noinspection PhpUndefinedVariableInspection */
$name = makeSafe($_POST[$nameFieldName]);
/** @noinspection PhpUndefinedVariableInspection */
$senderEmail1 = makeSafe($_POST[$email1FieldName]);
/** @noinspection PhpUndefinedVariableInspection */
$senderEmail2 = makeSafe($_POST[$email2FieldName]);
/** @noinspection PhpUndefinedVariableInspection */
$subject = makeSafe($_POST[$subjectFieldName]);
/** @noinspection PhpUndefinedVariableInspection */
$message = makeSafe($_POST[$messageFieldName]);
/** @noinspection PhpUndefinedVariableInspection */
$button = makeSafe($_POST[$submitButtonIdName]); // this will be set, but contain nothing

if (
    !isset($name) ||
    !isset($senderEmail1) ||
    !isset($message) ||
    !isset($button)
) {
    expire('Some vital fields were not given data.');
}

$error_message = "";

/** @noinspection PhpUndefinedVariableInspection  - defined in the contraints */
if (!preg_match("/^" . $nameRegex . "$/", $name)) {
    $error_message .= 'Please use only letters, numbers, space, or hyphen in your name.<br />';
}

if (!filter_var($senderEmail1, FILTER_VALIDATE_EMAIL)) {
    $error_message .= "The first email address you entered does not appear to be acceptable.<br />";
}
if (!filter_var($senderEmail2, FILTER_VALIDATE_EMAIL)) {
    $error_message .= "The second email address you entered does not appear to be acceptable.<br />";
}

if (strcmp($senderEmail1, $senderEmail2) != 0) {
    $error_message .= 'The two email addresses do not appear to be identical<br />';
}

/** @noinspection PhpUndefinedVariableInspection */
if (strlen($message) < $msgMinLen) {
    $error_message .= 'The message you entered appears to be rather short.<br />';
}
/** @noinspection PhpUndefinedVariableInspection */
if (strlen($message) > $msgMaxLen) {
    $error_message .= 'The message you entered appears to be too long.<br />';
}

if (strlen($error_message) > 0) {
    expire($error_message);
}

$headers = 'From: "' . $name . '" <' . $senderEmail1 . ">\r\n";
$headers .= 'Reply-To: ' . $senderEmail1 . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

// the message has already been 'made safe'
if (@mail($email_to, $subject, $message, $headers)) {
    expire("Thank you, your message has been sent.", true);
}

/**
 * Signify the result of handling the input
 * ToDo: On failure, think about going back to the form with the data previously entered
 * ToDo: On success, probably go back home, but (maybe) show a thank you message (so home has to hand GET prams in a nice way)
 *
 * @param $msg
 * @param bool $success - defaults to false
 */
function expire($msg, $success = false)
{
    if ($success) {
        error_log("Message was sent");
        header('Location: /contact?msg=' . makeSafe($msg));
    } else {
        error_log("Not Sending mail because :" . makeSafe($msg) . ":");
        header('Location: /contact?errors=' . makeSafe($msg));
    }
    exit();
}

/**
 * Make the string safe to send in an email and safe to dislay on the screen
 *
 * @param $input
 * @return string|string[]
 */
function makeSafe($input)
{
    return str_replace(
        array("content-type", "bcc:", "to:", "cc:", "href"),
        "",
        htmlspecialchars(trim($input), ENT_QUOTES, "UTF-8")
    );
}
