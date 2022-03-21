<?php

function getPathLocation($views)
{
    return [
        "root" => $_SERVER["DOCUMENT_ROOT"]
            . DIRECTORY_SEPARATOR . "speak_with_us"
            . DIRECTORY_SEPARATOR . "src"
            . DIRECTORY_SEPARATOR . $views
    ];
}
