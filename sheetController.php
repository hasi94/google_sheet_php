<?php
use Jenssegers\Blade\Blade;

require_once ("services/sheetService.php");

/**
 * Class sheetController
 * Created by PhpStorm.
 * User: Hasitha
 * Date: 2/23/2022
 * Time: 10:25 PM
 */
class sheetController
{
    public function __construct()
    {
        $this->blade = new Blade('views', 'cache');
        $this->sheet_service = new sheetService();
    }


    /**
     * get the current data on sheet
     */

    public function readSheet (){
        $data = $this->sheet_service->readSheet();
        echo $this->blade->render('show_data',['data'=>$data->values,'url'=>'/google_sheet/']);
    }

    /**
     * overwrite the original sheet
     */
    public function writeSheet () {
        $data = array(
            'Fname',
            'Lname'
        );
        $data = $this->sheet_service->writeSheet($data);
        return $this->readSheet();
    }

    /**
     * append values to the original sheet
     */
    public function appendSheet () {
        $data = array(
            'jhone','Doe','0712345698','JhoneDoe@gamil.com','1',Date('Y-m-d'),Date('H:m:s')
        );
        $data = $this->sheet_service->appendSheet($data);
        return $this->readSheet();
    }


    public function url(){
        return sprintf(
            "%s://%s%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['REQUEST_URI']
        );
    }
}
