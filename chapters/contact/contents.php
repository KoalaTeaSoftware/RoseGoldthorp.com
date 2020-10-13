<?php /** @noinspection PhpUndefinedVariableInspection */
$titleTag = "Contact Me";
$timeNow = gmdate('Ymdhms');
echo '<p hidden id="stamp">' . $timeNow . '</p>';
require_once "chapters/contact/constraints.php";
//============================================================================
$processingResult = "";
$resultDisplayCssClass = "";
if (isset($_GET)) {
    error_log("Some get params");
    if (isset($_GET['msg'])) {
        // Just show the thanks message, and no form
        $processingResult = str_replace(
            array("content-type", "bcc:", "to:", "cc:", "href"),
            "",
            htmlspecialchars(trim($_GET['msg']), ENT_QUOTES, "UTF-8"));
        echo '<p id="resultDisplay" class="text-success jumbotron display-4 text-center">' . $processingResult . '</p>';
        return;
    }
    if (isset($_GET['errors'])) {
        $processingResult = str_replace(
            array("content-type", "bcc:", "to:", "cc:", "href"),
            "",
            htmlspecialchars(trim($_GET['errors']), ENT_QUOTES, "UTF-8"));
        $resultDisplayCssClass = 'class="text-warning"';
        // todo: think about highlighting faulty fields
    }
}
?>
<script>
    function setFieldHighlight($element) {
        $element.classList.add("erroneousField");
    }

    function clearFieldHighlight($element) {
        $element.classList.remove("erroneousField");
    }

    function showCount(contents) {
        document.getElementById("letterCount").innerText = (<?= $msgMaxLen ?> - contents.length).toString();
    }

    function checkEmails() {
        const cont1 = document.getElementById("<?= $email1FieldName ?>");
        const cont2 = document.getElementById("<?= $email2FieldName ?>");

        if (cont2.value === cont1.value) {
            clearFieldHighlight(cont1);
            clearFieldHighlight(cont2);
            return true;
        } else {
            setFieldHighlight(cont1);
            setFieldHighlight(cont2);
            return false;
        }
    }

    function checkForm() {
        return checkEmails(); //until I can think of more things
    }
</script>
//=========================================================================================================
<p>If you don't already know my email, please write to me using this form (please use all fields)</p>

<!--suppress HtmlUnknownTarget -->
<form method="post" onsubmit="return checkForm()" action="/chapters/contact/sendmail.php">
    <!--suppress HtmlFormInputWithoutLabel -->
    <input hidden id="whadyano" value="<?= $timeNow ?>">

    <div class="form-group">
        <label for="<?= $nameFieldName ?>">Your Name</label>
        <input required id="<?= $nameFieldName ?>" name="<?= $nameFieldName ?>" type="text"
               maxlength="<?= $maxNameLength ?>"
               pattern="<?= $nameRegex ?>"
               placeholder="Please tell me your name"
               aria-describedby="nameHelp" class="form-control">
        <small class="form-text text-muted" id="nameHelp">Please tell me your name.</small>
    </div>
    <div class="form-group">
        <label for="<?= $email1FieldName ?>">Email address</label>
        <input required id="<?= $email1FieldName ?>" name="<?= $email1FieldName ?>" type="email"
               maxlength="<?= $maxEmailLength ?>"
               placeholder="Please enter your email"
               onblur="checkEmails()"
               aria-describedby="emailHelp" class="form-control">
        <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone
            else.</small>
    </div>
    <div class="form-group">
        <label for="<?= $email2FieldName ?>">Email address confirmation</label>
        <input required id="<?= $email2FieldName ?>" name="<?= $email2FieldName ?>" type="email"
               maxlength="<?= $maxEmailLength ?>"
               placeholder="Please re-enter your email"
               onblur="checkEmails()"
               aria-describedby="emailConfHelp" class="form-control">
        <small class="form-text text-muted" id="emailConfHelp">Please type it again, just to check.</small>
    </div>

    <div class="form-group">
        <label for="<?= $subjectFieldName ?>">Subject</label>
        <input required id="<?= $subjectFieldName ?>" name="<?= $subjectFieldName ?>" type="text"
               maxlength="<?= $maxSubjectLength ?>"
               placeholder="RE: something ..."
               aria-describedby="subjectHelp" class="form-control">
        <small class="form-text text-muted" id="subjectHelp">Please provide a subject.</small>
    </div>
    <div class="form-group">
        <label>Your Message: (chars left: <span id="letterCount"><?= $msgMaxLen ?></span>)
            <textarea required id="<?= $messageFieldName ?>" name="<?= $messageFieldName ?>"
                      minlength="<?= $msgMinLen ?>" maxlength="<?= $msgMaxLen ?>" rows="5" cols="180"
                      class="form-control" onkeyup="showCount(this.value)"></textarea>
        </label>
    </div>
    <button class="btn btn-primary brandedButton" type="submit" name="<?= $submitButtonIdName ?>">Send</button>
</form>
