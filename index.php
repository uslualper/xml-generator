<?php
/**
 * 
 * @author Alper Uslu <uslualper@outlook.com>
 * 
 */

require_once("./bootstrap.php");

use System\Test\ITest;
use Test\ModelTest;
use Test\XmlTest;

$modelTest = @$_GET['model_test'];

if($modelTest==="cimri" || $modelTest==="epey"){
    testHandle(new XmlTest($modelTest),"xml");
}elseif($modelTest){
    testHandle(new ModelTest());
}

function testHandle(ITest $test, $contentType = "json"){

    if($contentType === "json"){
        header("Content-Type: application/json; charset=utf-8");
        print_r(json_encode($test->handle()));
    }else{
        header("Content-type: text/xml");
        echo $test->handle();
    }
    die();
}

?>


<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
<div class="grid justify-center">
    <h1 class="text-3xl font-bold underline"></h1>

    <div class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">XML Generator</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400"></p>

        <div class="inline-flex rounded-md shadow-sm" role="group">
            <a href="/?model_test=cimri" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Cimri XML
            </a>
            <a href="/?model_test=1" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Model Testing JSON
            </a>
            <a href="/?model_test=epey" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Epey XML
            </a>
        </div>
    </div>
</div>


</body>
</html>