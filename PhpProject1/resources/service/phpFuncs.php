<?php

function getFilesFrom($dir){
    if (is_null($dir)) {
        $dir = "/images/";
    }
    $files = scandir($dir);
        
    return $files;
}

function getCssFiles($dir){
    $contents = getFilesFrom($dir);
    
    foreach($contents as $file){
        $fullPath = $dir . $file;
        if(is_file($fullPath) && substr($file, strpos($file, '.')) == ".css"){
            echo "<link rel='stylesheet' type='text/css' href='" . $fullPath . "'>";
        }
    }
}

function getXMLFile($fileDir)
{
    $fileContents = "";
    if(file_exists($fileDir))
    {
        $fileContents = simplexml_load_file($fileDir);
    }
    else
    {
        echo "Failed to open " . $fileDir;
    }
    
    return $fileContents;
}

function outputTiles($extXML)
{
    if(is_object($extXML))
    {
        for($i = 0; $i < count($extXML->tile); $i++)
        {
            echo "<div class='tile-block tile-" . ($i + 1) . "' >";
            echo "<h3 class='tile-title'>" . $extXML->tile[$i]->title . "</h3>";
            echo "<p>" . $extXML->tile[$i]->description . "</p>";
            echo "</div>";
        }
    }
}