
<script>
    document.title = "<?=
        // the script is run before the drawing of the footer, in case a test script uses the footer as an indication of page load completion
        // some chapters have unfriendly names,and will set up a prettier name. Use it.
        // this variable is defined in the index.php that requires this file, so
        /** @noinspection PhpUndefinedVariableInspection */
        $titleTag ?>";
    document.getElementById("<?=
        /** @noinspection PhpUndefinedVariableInspection */
        $chapter ?>Nav").classList.add("active");
</script>

