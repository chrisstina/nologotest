<?php

namespace components\parsers;

/**
 *
 * @author chriss
 */
class TextParser implements \components\ICatalogueDataParser {
    
    public static function itemDelimiter() {
        return PHP_EOL;
    }
    
    public static function columnDelimiter() {
        return '|';
    }
    
    /**
     * Из текста с описанной в задании структурой генерирует массив
     */
    public static function parse($rawData) {
        $lines = explode(self::itemDelimiter(), $rawData);
        $result = [];
        
        foreach($lines as $line) {
            if ($line !== '') {
                list($id, $parentId, $title) = explode(self::columnDelimiter(), $line);
                $result[] = ['id' => $id, 'parentId' => $parentId, 'title' => $title];
            }
        }
        
        return $result;
    }
}
