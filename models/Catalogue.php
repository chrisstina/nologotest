<?php
namespace models;

/**
 *
 * @author chriss
 */
class Catalogue {
    
    /* Источник данных. Впоследствии настройку источника данных можно вынести в конфиг-файл и подключать динамически, указывая название класса */
    private $_dataSource;
    
    /* Обработчик данных */
    private $_parser;
        
    public function setParser(\components\ICatalogueDataParser $parser) {
        $this->_parser = $parser;
    }
    
    public function getParser() {
        return $this->_parser;
    }
    
    public function setDataSource(\components\CatalogueDataSource $dataSource) {
        $this->_dataSource = $dataSource;
    }
    
    public function getDataSource() {
        return $this->_dataSource;
    }
    
    /**
     * Вернет структурированный массив данных
     */
    public function getTree() {
        return $this->getParser()->parse($this->getDataSource()->getData());
    }
    
    function printTree($items, $parent = 0, $level = 0) {
        $tree = '<ul>';
        $total = count($items); 
        for ($i = 0; $i < $total; $i++) {
            if($items[$i]['parentId'] == $parent){
                $tree .= '<li>';
                $tree .= $items[$i]['title'];
                $tree .= $this->printTree($items, $items[$i]['id'], $level++);
                $tree .= '</li>';
            }
        }
        $tree .= '</ul>';
        
        return $tree;
    }
}
