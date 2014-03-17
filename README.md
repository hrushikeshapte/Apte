Instagram Bundle using Symphony and Guzzle

This is a simple web application consisting of 2 pages. The first page displays popular images on instagram and the second is used to show details about a particular photo. The program is created using PHP, Symphony and Guzzle APIs.

To run the program, 
download composer , symphony and guzzle .

then generate symlinks using 
php app/console assets:install --symlinks

Go to Controller/GuzzleController.php under that change 'apiCallback' and change the http://localhost depending on what you use to run the program on xampp.
