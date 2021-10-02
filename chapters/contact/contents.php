<?php
/** ToDo: replace this with something like the nicer forms on, say Daily Dilettante.  */
/** @noinspection PhpUndefinedVariableInspection */
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
            htmlspecialchars(trim($_GET['msg'])));
        echo '<p id="resultDisplay" class="text-success jumbotron display-4 text-center">' . $processingResult . '</p>';
        return;
    }
    if (isset($_GET['errors'])) {
        $processingResult = str_replace(
            array("content-type", "bcc:", "to:", "cc:", "href"),
            "",
            htmlspecialchars(trim($_GET['errors']), ENT_QUOTES));
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

<h1>Contact Me</h1>
<p>If you don't already know my email, please write to me using this form (please use all fields)</p>

<!--suppress HtmlUnknownTarget -->
<form method="post" onsubmit="return checkForm()" action="/chapters/contact/sendmail.php">
    <!--suppress HtmlFormInputWithoutLabel -->
    <input hidden id="whadyano" value="<?= $timeNow ?>">

    <div class="form-group">
        <input required id="<?= $nameFieldName ?>" name="<?= $nameFieldName ?>" type="text"
               maxlength="<?= $maxNameLength ?>"
               pattern="<?= $nameRegex ?>"
               placeholder="Please tell me your name"
               class="form-control">
    </div>
    <div class="form-group">
        <input required id="<?= $email1FieldName ?>" name="<?= $email1FieldName ?>" type="email"
               maxlength="<?= $maxEmailLength ?>"
               placeholder="Please enter your email address"
               onblur="checkEmails()"
               class="form-control">

    </div>
    <div class="form-group">
        <input required id="<?= $email2FieldName ?>" name="<?= $email2FieldName ?>" type="email"
               maxlength="<?= $maxEmailLength ?>"
               placeholder="Please re-enter your email"
               onblur="checkEmails()"
               class="form-control">
    </div>

    <div class="form-group">
        <input required id="<?= $subjectFieldName ?>" name="<?= $subjectFieldName ?>" type="text"
               maxlength="<?= $maxSubjectLength ?>"
               placeholder="RE: something ..."
               class="form-control">
    </div>
    <div class="form-group">
        <label>Your Message: (chars left: <span id="letterCount"><?= $msgMaxLen ?></span>)
            <textarea required
                      id="<?= $messageFieldName ?>" name="<?= $messageFieldName ?>"
                      minlength="<?= $msgMinLen ?>" maxlength="<?= $msgMaxLen ?>" rows="5" cols="200"
                      class="form-control"
                      onkeyup="showCount(this.value)"></textarea>
        </label>
    </div>
    <button class="btn brandedButton" type="submit" name="<?= $submitButtonIdName ?>" style="font-size: x-large"> Send
    </button>
</form>
