<?php

spl_autoload_register(function ($className)
{
    $file = str_replace('\\',DIRECTORY_SEPARATOR, $className);
    require_once $file.'.php'; 
});


use \components\datasources\FileDataSource;
use \helpers\RequestHelper;
use \models\Catalogue;

// при наличии роутинга и контроллеров, этот код выносится в контоллер. в данной задаче - для упрощения, вызваем методы прямо так

$catalogue = new Catalogue();
$catalogue->setDataSource(new FileDataSource(RequestHelper::get('filename')));
$catalogue->setParser(new \components\parsers\TextParser());

// метод printTree() впоследствии можно вынести в раздел view
try
{
    echo $catalogue->printTree($catalogue->getTree());
} catch (\Exception $e) {
    echo 'Не удалось получить данные. Ошибка: ' . $e->getMessage();
}