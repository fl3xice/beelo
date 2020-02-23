<form action="/action" method="post">
    <input type="text" value="<?php print generateActionKey() ?>" name="action">
    <script>
        document.forms[0].submit();
    </script>
</form>
