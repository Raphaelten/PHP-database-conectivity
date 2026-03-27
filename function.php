<?php
//function comb () {      //// incorrect 
  //  ucfirst(trim());
    //}

function clean($anything){
    $anything = trim($anything);
    $anything = ucfirst($anything);

    return $anything;
}
function showEditButton($rowUsername, $sessionUsername, $userId) { { //testing to see if i can add link to a function it worked 
        return "<td><a href='edit_user.php?id=$userId' class='btn btn-sm btn-warning'>Edit</a></td>";
    }
}

?>