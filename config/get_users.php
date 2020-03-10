<?php
    include 'init.php';

    $db_user = "root";
    $db_pass = "";
    $db_server = "localhost";
    $db_db = "filmoteka";
    $table = "users";
    $primaryKey = 'id';
    
    // Niz sa nazivima kolona iz baze. Prvi niz dodaje id atribut u svaki <tr>
    $columns = array(
    array(
            'db' => 'id',
            'dt' => 'DT_RowId',
            'formatter' => function( $d, $row ) {
                return $d;
            }
        ),
        array( 'db' => 'id', 'dt' => 0 ),
        array( 'db' => 'username',  'dt' => 1 ),
        array( 'db' => 'roleID',   'dt' => 2 ),
    );
    
    // SQL server connection information
    $sql_details = array(
        'user' => $db_user,
        'pass' => $db_pass,
        'db'   => $db_db,
        'host' => $db_server
    );
    
    
    //Treba postaviti putanju do ssp.class.php (proveriti folder gde se nalazi DataTables)
    
    require( 'ssp.class.php' );
    
    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );

?>