# google_sheet_php
Use php to write and read googlesheet

#Basic Requirments

create GoogleApp using : https://console.developers.google.com/

create OAuth 2.0 Client ID ->download json file and rename it to credentials.json  and paste inside asset folder

create service account  for your app and get your service account email

add service account email to google sheet you want with editor/owner permission

get your google sheet ID and paste it inside services->sheetService.php $this->documentId

##Step 1: goto .htaccess file and rename google_sheet with your root folder name 
```bash
RewriteRule ^(.+)$ YOUR FOLDER NAME/index.php [QSA,L]
```
##Step 2: Install the Google Client Library
```bash
composer require google/apiclient
```

##Step 3: Install the Blade

```bash
composer require jenssegers/blade
```

##Step 4: Enjoy ! 
