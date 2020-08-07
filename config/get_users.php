<?php
    include 'init.php';

    $db_user = "root";
    $db_pass = "";
    $db_server = "localhost";
    $db_db = "filmoteka";
    $primaryKey = 'id';

    $table = <<<EOT
        (
            SELECT
            u.id,
            u.username,
            r.roleName
            FROM users u
            LEFT JOIN roles r ON u.roleID = r.roleID
        ) temp
    EOT;
    
    $columns = array(
        array( 'db' => 'id', 'dt' => 0 ),
        array( 'db' => 'username',  'dt' => 1 ),
        array( 'db' => 'roleName',   'dt' => 2 ),
    );
    
    $sql_details = array(
        'user' => $db_user,
        'pass' => $db_pass,
        'db'   => $db_db,
        'host' => $db_server
    );
    
    require( 'ssp.class.php' );
    
    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );

?>