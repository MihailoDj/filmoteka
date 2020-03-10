$(document).ready( function () {
    $('#users-table').DataTable({
        "columns": [
               { "title": "Id" },
               { "title": "Korisnicko ime" },
               { "title": "Uloga" },
           ],
        "ajax": "./config/get_users.php",
        "processing": true,
        "serverSide": true,
        "lengthMenu": [10],
       });

    $('#users-table').addClass("display");
    $('#users-table').addClass("cell-border");
} );
