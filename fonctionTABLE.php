<?php



function afficherTable($rows, $headre){?>
        <table>
            <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>emaail</th>
            </tr>
            <tr>
                <td></td>
            </tr>
        </table>
<?php } 

function getHeaderTable(){
    $header = array();
    $header[] = "id";
    $header[] = "nom";
    $header[] = "prenom";
    $header[] = "email";
    return $header;

}

?>

