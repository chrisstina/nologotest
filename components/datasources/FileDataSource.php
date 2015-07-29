<?php

namespace components\datasources;

/**
 * Класс для получения данных из файла
 *
 * @author chriss
 */
class FileDataSource extends \components\CatalogueDataSource {
    
    private $_filename = 'test.txt';
    
    public function __construct($filename = null) {
        if ($filename) {
            $this->setFilename($filename);
        }
    }
    
    public function setFilename($filename) {
        $this->_filename = $filename;
    }
    
    public function getData() {
        if ( ! $contents = @file_get_contents('data' . DIRECTORY_SEPARATOR . $this->_filename)) {
           throw new \Exception('Missing ' . 'data' . DIRECTORY_SEPARATOR . $this->_filename . '.');
        } else {
            return $contents;            
        }
        
        return false;
    }
}
