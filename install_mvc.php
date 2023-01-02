<?php
// consulta para crear un usuario en bd
$sql = "CREATE USER \'mvc_datos\'@\'localhost\' IDENTIFIED WITH mysql_native_password AS \'***\';GRANT ALL PRIVILEGES ON *.* TO \'mvc_datos\'@\'localhost\' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;";

?>