<?php

class createFile {
    private $dir;
    private $ListItem = array();
    private $filename = "userInput";
    private $myFile;
    public function __construct(string $url) {
        $this->dir = $url;
    }
    
    public function addItem($key, $value)
    {
        $item = array($key => $value);
        try {
            $this->ListItem = array_merge($this->ListItem, $item);
        } catch (Exception $ex) {
            echo "ERROR PUSHING TO ARRAY";
        }
        
    }
    
    public function createFile(){
        try {         
            if($this->dir == null){
                throw new Exception("No file directory has been set.");
            } 
            else if(!is_string($this->dir))
            {
                throw new Exception("Directory isn't a string");
            }
            else if(!file_exists($this->dir))
            {
                throw new Exception("Directory doesn't exist");
            }
            
            $fileNo = $this->getFileName();

            if($fileNo > 0)
            {
                $this->filename .= (string)$fileNo . ".txt";
            }
            else
            {
                $this->filename .= ".txt";
            }
            $this->myFile = fopen($this->dir . DIRECTORY_SEPARATOR . $this->filename, 'x+');
            
            $this->writeToFile();
            
        } catch (Exception $ex) {
            
        }
    }
    
    private function getFileName() {
        
        $iNumOf = 0;
        $files = scandir($this->dir);
        
        foreach($files as $file)
        {
            if(substr($file, 0, strlen($this->filename)) === $this->filename ){
                
                $iNumOf += 1;                
            }
        }
        return $iNumOf;
    }
    
    private function writeToFile() {
        foreach($this->ListItem as $key => $value)
        {
            fwrite($this->myFile, $key . ":" . $value . PHP_EOL);
        }
    }
    
}
