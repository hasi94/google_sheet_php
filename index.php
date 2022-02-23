<?php
/**
 * this is simple router for this application
 */

use Jenssegers\Blade\Blade;

$base_url  = "/google_sheet/";
require __DIR__ . '/sheetController.php';
$request = $_SERVER['REQUEST_URI'];
$sheet_controller = new sheetController();
$blade = new Blade('views', 'cache');


switch ($request) {
    case '/' :
        $sheet_controller->readSheet();
        break;
    case '' :
        $sheet_controller->readSheet();
        break;
    case $base_url :
        $sheet_controller->readSheet();
        break;
    case $base_url.'write-sheet' :
       $sheet_controller->writeSheet();
        break;
    case $base_url.'append-sheet' :
        $sheet_controller->appendSheet();
        break;
    default:
        http_response_code(404);
        echo $blade->render('404',['url'=>$sheet_controller->url()]);
        break;
}
