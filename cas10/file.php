<?php
namespace   FileManipulation;

class File {
    private $handle;
    private $mode;
    private $path;
    public  static $writeMods = ["r+",'w', 'w+', 'a', 'a+'];
    public static $readModes = ['r','r+','w+','a+'];
    function __construct($path, $mode) {
        $this->mode = $mode;
        $this->path = $path;
        $this->handle = fopen($path, $mode);
    }
    
    function write($row) {
        // Check if the file is open for writing
        if(in_array($this->mode, File::$writeMods)){
            fseek($this->handle, -1, SEEK_END);
        return fputcsv($this->handle, $row);
        }
        return false;
    }
        function read(){
            if(in_array($this->mode, self::$readModes)){
                rewind($this->handle);
                $result = [];
                while (!feof($this->handle)) {
                   $row = fgetcsv($this->handle);
                   if($row) {
                       $result[] = $row;
                   }
                }
                return $result;
            }
        }

    function __destruct() {
        fclose($this->handle);
    }
}