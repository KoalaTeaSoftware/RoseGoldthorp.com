<?php
// placing these values here allow commonality between the form and the server-side checking
$maxNameLength = 30;
$maxEmailLength = 100; // the real maximum is about 320 chars, but it is unlikely that any more than this will be a real address
$maxSubjectLength = 100;
$msgMaxLen = 5000;
$msgMinLen = 10;

$nameFieldName = "name";
$email1FieldName = "emailAddress";
$email2FieldName = "emailAddressConf";
$subjectFieldName = "subject";
$messageFieldName = "yourMessage";
$submitButtonIdName = "sendMsg";

$nameRegex = "[A-Za-z0-9 .\-]+";
