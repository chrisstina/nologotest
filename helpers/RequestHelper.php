<?php

namespace helpers;

/**
 * Вспомогательный класс для работы с http-запросами
 *
 * @author chriss
 */
class RequestHelper {
    public function get($fieldName) {
        return filter_input(INPUT_GET, $fieldName, FILTER_SANITIZE_STRING);
    }
    
    public function post($fieldName) {
        ;
    }
}
