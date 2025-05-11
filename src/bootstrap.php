<?php
require_once 'Libs/Utils/AutoLoader.php';

use Libs\Utils\AutoLoader;

$auto_loader = AutoLoader::getInstance(dirname(__FILE__));

$project = \Libs\Project::getInstance();