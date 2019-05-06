<?php    
    // load up your config file
    require_once("resources/config.php");
    require_once("resources/service/phpFuncs.php");
    require_once(TEMPLATES_PATH . "/header.php");
?>
<div id="container">
    <div id="content">
        <!-- content -->
        <?php 
        $tiles = getXMLFile("resources/library/HomepageTiles.xml");
        
        outputTiles($tiles);
        ?>
    </div>
</div>
<?php
    require_once(TEMPLATES_PATH . "/footer.php");
?>