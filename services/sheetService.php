<?php
require  'vendor/autoload.php';
$sheet_service = new sheetService();

use Google\Service\Sheets;

/**
 * Class sheetService
 * Created by PhpStorm.
 * User: Hasitha
 * Date: 2/23/2022
 * Time: 10:26 PM
 */
class sheetService
{
    public $clent,$services,$documentId,$range;
    public function __construct()
    {
        $this->client = $this->getClient();
        $this->services = new Sheets($this->client);
        $this->documentId ='1C53qBSCRC1MLvno9C3aPMDz8BU0R9F3h41RlzA7R-4I';
        $this->range = 'A:Z';

    }

    public function getClient() {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Sheets::SPREADSHEETS);
        $client->setRedirectUri('http://localhost/google_sheet');
        $client->setAuthConfig( 'asset/credentials.json');
        $client->setAccessType('offline');
        return $client;
    }

    public function readSheet($range ='A:Z') {
        $doc = $this->services->spreadsheets_values->get($this->documentId,$range);
        return $doc;
    }

    public function writeSheet($data,$range ='A:Z',) {
        $values = [$data];
        $body = new Sheets\ValueRange([
            'values' => $values
        ]);

        /**
         * USER_ENTERED : eg(1+2 is show as 3 in sheet)
         * RAW : eg (1+2 is show as 1+2 in sheet)
         */
        $params = [
          'valueInputOption' => 'RAW'
        ];
        $this->services->spreadsheets_values->update($this->documentId,$range,$body,$params);
        return $this->readSheet();
    }

    public function appendSheet($data,$range ='A:Z',) {
        $values = [$data];
        $body = new Sheets\ValueRange([
            'values' => $values
        ]);
        $params = [
            'valueInputOption' => 'RAW'
        ];
        $this->services->spreadsheets_values->append($this->documentId,$range,$body,$params);
        return $this->readSheet();
    }
}
