<?php    
    // load up your config file
    require_once("resources/config.php");
    require_once("resources/service/phpFuncs.php");
    require_once(TEMPLATES_PATH . "/header.php");
    require_once("resources/service/createFile.php");
?>
<div id="container">
    <div id="content">
        <!-- content -->
        <div class="tile-area">
            <?php 
            $tiles = getXMLFile("resources/library/HomepageTiles.xml");

            outputTiles($tiles);
            ?>
        </div>
        <?php 
        $file = new createFile("C:\Users\alexa\Desktop" . DIRECTORY_SEPARATOR);
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $file->addItem("Name", $_POST["nameInput"]);
            $file->addItem("Age", $_POST["ageInput"]);
            $file->addItem("Quantity", $_POST["quantityInput"]);
            $file->addItem("Type", $_POST["typeInput"]);
            
            $file->createFile();
        }

        ?>
        <form action="index.php" method="post">
            <div class="form-element">
                <label for="nameInput">Name:</label>
                <input name="nameInput" type="text">
            </div>
            <div class="form-element">
                <label for="nameInput">Age:</label>
                <input name="ageInput" type="text">
            </div>
            <div class="form-element">
                <label for="nameInput">Quantity:</label>
                <input name="quantityInput" type="text">
            </div>
            <div class="form-element">
                <label for="nameInput">Type:</label>
                <select name="typeInput">
                    <option value="plates">Plates</option>
                    <option value="bowls">Bowls</option>
                    <option value="cups">Cups</option>
                    <option value="glasses">Glasses</option>                    
                </select>
            </div>
            <input type="submit" id="formSubmit"/>
        </form>
    </div>
</div>
<?php
    require_once(TEMPLATES_PATH . "/footer.php");
?>