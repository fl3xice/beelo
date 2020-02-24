<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beelo Install</title>

    <link rel="stylesheet" type="text/css" href="css/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/JavaScript-autoComplete/1.0.4/auto-complete.min.css" integrity="sha256-GHbWr7miG/WXEsrIb47MsX3KBJa9FTyi5ZMYr4XDHAQ=" crossorigin="anonymous" />

</head>
<body>

    <div class="ui fluid container" style="padding: 90px;">
        <div class="ui segment">
            <h1>Install</h1>
            <form class="ui form">
                <div class="fields">
                    <div class="twelve wide field">
                        <label>Database IP</label>
                        <input type="text" name="db-ip" id="db_ip" placeholder="IP">
                    </div>
                    <div class="four wide field">
                        <label>Database Port</label>
                        <input type="text" name="db_port" id="db_port" placeholder="Port">
                    </div>
                </div>
                <div class="field">
                    <label>Database Name</label>
                    <input type="text" name="db-name" id="db_name" placeholder="DB Name">
                </div>
                <div class="field">
                    <label>Database User</label>
                    <input type="text" name="db-user" id="db_user" placeholder="DB User">
                </div>
                <div class="field">
                    <label>Database Password</label>
                    <input type="password" name="db-password" id="db_password" placeholder="DB Password">
                </div>
                <div class="ui animated button" id="next" tabindex="0">
                    <div class="visible content">Next</div>
                    <div class="hidden content">
                        <i class="right arrow icon"></i>
                    </div>
                </div>
                <button class="ui button" type="button" id="test_connect">Test Connection</button>
                <script
                        src="https://code.jquery.com/jquery-3.1.1.min.js"
                        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                        crossorigin="anonymous"></script>
                <script src="js/semantic.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js" integrity="sha256-zs4Ql/EnwyWVY+mTbGS2WIMLdfYGtQOhkeUtOawKZVY=" crossorigin="anonymous"></script>

                <script>

                    document.getElementById("next").addEventListener("click", () => {
                        $.ajax({

                        });
                    });

                    let db_ip = document.getElementById("db_ip").value;
                    let db_port = document.getElementById("db_port").value;
                    let db_name = document.getElementById("db_name").value;
                    let db_user = document.getElementById("db_user").value;
                    let db_password = document.getElementById("db_password").value;

                    let request_inf = {
                        db_ip: db_ip,
                        db_port: db_port,
                        db_name: db_name,
                        db_user: db_user,
                        db_password: db_password
                    };

                    $("#next").hide();

                    document.getElementById("test_connect").addEventListener("click", function () {
                        let db_ip = document.getElementById("db_ip").value;
                        let db_port = document.getElementById("db_port").value;
                        let db_name = document.getElementById("db_name").value;
                        let db_user = document.getElementById("db_user").value;
                        let db_password = document.getElementById("db_password").value;

                        request_inf = {
                            name: "TestConnection",
                            db_ip: db_ip,
                            db_port: db_port,
                            db_name: db_name,
                            db_user: db_user,
                            db_password: db_password
                        };



                        let result = btoa(JSON.stringify(request_inf));

                        $.ajax({
                            method: "POST",
                            url: "/action",
                            data: {
                                "action": result
                            },
                            beforeSend: (e) => {
                                document.getElementById("test_connect").classList.toggle("loading");
                            }
                        }).done((data) => {
                            $("#successful").remove();
                            document.getElementById("test_connect").classList.toggle("loading");
                            $("#test_connect").addClass("right labeled icon");
                            let iconChecked = document.createElement("i");
                            iconChecked.classList.add("check", "circle", "icon");
                            iconChecked.id = "successful";
                            $("#test_connect").append(iconChecked);
                            $("#next").show();
                        }).fail((data) => {
                            $('.mini.modal')
                                .modal('show')
                            ;
                            $("#test_connect").removeClass("right labeled icon");
                            $("#successful").remove();
                            document.getElementById("test_connect").classList.toggle("loading");
                            $("#next").hide();
                        })
                    });


                    $("#db_ip").autoComplete({
                        minChars: 2,
                        source: function(term, suggest){
                            term = term.toLowerCase();
                            let choices = [
                                '127.0.0.1',
                                '192.168.0.1',
                                '192.168.0.2',
                                '192.168.1.1'
                            ];
                            let matches = [];
                            for (i=0; i<choices.length; i++)
                                if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
                            suggest(matches);
                        }
                    });

                    $("#db_port").autoComplete({
                        minChars: 1,
                        source: function(term, suggest){
                            term = term.toLowerCase();
                            let choices = [
                                '3306',
                                '81',
                                '80',
                                '3300'
                            ];
                            let matches = [];
                            for (i=0; i<choices.length; i++)
                                if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
                            suggest(matches);
                        }
                    });

                </script>

            </form>
            <div class="ui mini modal">
                <div class="header">Fail</div>
                <div class="content">
                    <p>Verify the data is correct.</p>
                    <p>Or ask a question at <a href="https://github.com/fl3xice/beelo/issues" target="_blank">https://github.com/fl3xice/beelo/issues</a></p>
                </div>
                <div class="actions">
                    <div class="ui approve button">OK</div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>