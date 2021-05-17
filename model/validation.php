<?php
function validName($name)
{
    return strlen(trim($name)) >= 2;
}

function validChoice($choices)
{
    $validChoices = getChoices();

    //Make sure each selected condiment is valid
    foreach ($choices as $userChoice) {
        if (!in_array($userChoice, $validChoices)) {
            return false;
        }
    }

    //All choices are valid
    return true;
}