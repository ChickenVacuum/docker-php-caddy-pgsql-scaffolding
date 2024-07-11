<html lang="en">
<head>
    <title>Localhost install</title>
    <style>
        body {
            background-color: rgb(15 23 42/1);
            color: rgb(148 163 184/1);
            font-family: Inter var, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            margin-left: 1rem;
            margin-top: 1rem;

        }
    </style>

</head>
<body>
<p>Installation OK, you may now remove the public folder and install your framework, which should have a
    public/index.php, or update the Caddyfile.
</p>
<p>PHP version: <?php
    echo phpversion();
    ?>
</p>
<p>
    DB Status:
    <?php
    $dbConnection = pg_connect("host=db_container port=5432 dbname=app_db user=postgres password=pgsql_pwd");
    if ($dbConnection === false) {
        echo "❌<br>
    Does your host, port, dbname, user and password match?<br>
    - host should be the db container_name in compose file.<br>
    - dbname and password are in db environment section, in compose file.<br>
    - port and user are default.";
    }
    else {
        echo "✅";
    }
    ?>
</p>

</body>
</html>
