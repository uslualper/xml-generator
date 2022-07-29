<?php

//system
foreach (glob('system/xml/' . '*.php') as $filename) require_once($filename);
foreach (glob('system/model/' . '*.php') as $filename) require_once($filename);
foreach (glob('system/test/' . '*.php') as $filename) require_once($filename);

//models
foreach (glob('models/' . '*.php') as $filename) require_once($filename);

//test
foreach (glob('test/' . '*.php') as $filename) require_once($filename);