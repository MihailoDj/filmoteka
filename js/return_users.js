function fillUsersTable() {
    $.ajax({
        url: 'config/kontroler.php?metoda=RETURN_USERS',
        success: function(data){
            var output ='<table class="diplay" id="users-table"><thead><tr><th>ID</th><th>Korisnicko ime</th><th>Uloga</th></tr></thead><tbody>';
            $.each(JSON.parse(data),function(i,red){
                output+='<tr>';
                output += '<td>'+ red.id + '</td>';
                output += '<td>'+ red.username + '</td>';
                output += '<td>'+ red.roleName + '</td>';
                output += '</tr>';
            });
            output+='</tbody></table>';
            $("#tabela").html(output);
            $("#tabela").css("margin-top", "16rem");
        }
    })
}

fillUsersTable();

$(document).ready( function () {
    $('#users-table').DataTable();
    $('#users-table').addClass("display");
    $('#users-table').addClass("cell-border");
} );
