<?php
function validName($name)
{
    return !empty($name);
}

function validChoice($choices)
{
    if ($choices == null)
    {
        return false;
    }
    return count($choices) > 0;
}