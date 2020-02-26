<?php

require_once "packages/example.example/MyPackage.php";



?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beelo ViewInfo</title>

    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/JavaScript-autoComplete/1.0.4/auto-complete.min.css" integrity="sha256-GHbWr7miG/WXEsrIb47MsX3KBJa9FTyi5ZMYr4XDHAQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/viewcss.css">
</head>
<body>

<div class="ui text container">
    <h1 class="ui dividing header">ViewInfo</h1>
    <div class="ui divided selection list" style="user-select: none">
        <?php

            if (GlobalManager::CheckInstalled())
            {
              print "<a class=\"item\">
            Installed <div class=\"ui horizontal green label\">Yes</div>
        </a>";
            } else {
                print "<a class=\"item\">
            Installed <div class=\"ui horizontal red label\">No</div>
        </a>";
            }
            if (GlobalManager::CheckVersion())
            {
                print "<a class=\"item\">
                PHP 7.4.1 <div class=\"ui horizontal green label\">Yes</div>
            </a>";
            } else {
                print "<a class=\"item\">
                PHP 7.4.1 <div class=\"ui horizontal red label\">No</div>
            </a>";
            }
            if (GlobalManager::CheckHtaccess())
            {
                print "<a class=\"item\">
                    .htaccess <div class=\"ui horizontal green label\">Yes</div>
                </a>";
            } else {
                print "<a class=\"item\">
                    .htaccess <div class=\"ui horizontal red label\">No</div>
                </a>";
            }
            if (GlobalManager::CheckLicense())
            {
                print "<a class=\"item\">
                        License <div class=\"ui horizontal green label\">Yes</div>
                    </a>";
            } else {
                print "<a class=\"item\">
                        License <div class=\"ui horizontal red label\">No</div>
                    </a>";
            }

            if (file_exists("js/main.js"))
            {
                print "<a class=\"item\">
                            Main.js there is <div class=\"ui horizontal green label\">Yes</div>
                        </a>";
            } else {
                print "<a class=\"item\">
                            Main.js there is <div class=\"ui horizontal orange label\">No</div>
                        </a>";
            }
        ?>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>
<script src="js/semantic.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js" integrity="sha256-zs4Ql/EnwyWVY+mTbGS2WIMLdfYGtQOhkeUtOawKZVY=" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>