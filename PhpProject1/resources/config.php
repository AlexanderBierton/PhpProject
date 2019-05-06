<?php

$config = array(
    "urls" => array(
        "baseurl" => "http://localhost/PhpProject1/"
    ),
    "paths" => array(
        "resources" => $_SERVER["DOCUMENT_ROOT"] . "\resources",
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "\images\content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "\images\layout"
        )
    )
);

defined("LIBRARY_PATH")
    or define("LIBRARY_PATH", realpath(dirname(__FILE__)) . "/library");

defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH", realpath(dirname(__FILE__)) . "/templates");

ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRICT);