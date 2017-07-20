<?php
require_once 'vendor/autoload.php';
use Screen\Capture;
use Jenssegers\ImageHash\ImageHash;

//$url = 'https://www.itdashboard.gov/';
$url = "https://www.itdashboard.gov/drupal/summary/012";

$goodfile = '/var/www/invertice/good.png';

$screenCapture = new Capture($url);
$screenCapture->setImageType('png');
$screenCapture->setDelay(5000);
$screenCapture->save($goodfile);

$algs = array(
    new Jenssegers\ImageHash\Implementations\AverageHash(),
    new Jenssegers\ImageHash\Implementations\DifferenceHash(),
    new Jenssegers\ImageHash\Implementations\PerceptualHash() );

foreach ($algs as $alg) {

    print_r($alg);

    $hasher = new ImageHash($alg);
    $goodhash = $hasher->hash($goodfile);

    $url = "https://www.itdashboard.gov/drupal/summary/202";

    for ($delay = 0; $delay < 3001; $delay += 500) {
//    print ("Testing with delay $delay".PHP_EOL);

        $screenCapture = new Capture($url);
        $screenCapture->setImageType('png');
        $screenCapture->setDelay($delay);
        $fileLocation = "/var/www/invertice/screenshot.${delay}." . $screenCapture->getImageType()->getFormat();
        $screenCapture->save($fileLocation);

        $hash = $hasher->hash($fileLocation);

//    print ("good - $goodhash" . PHP_EOL);
//    print ("test - $hash" . PHP_EOL);
//    print PHP_EOL;
//    print PHP_EOL;
//    print decbin(hexdec($goodhash));
//    print PHP_EOL;
//    print decbin(hexdec($hash));
//    print PHP_EOL;


        $distance = $hasher->distance($goodhash, $hash);
        print  "The distance was $distance with delay $delay" . PHP_EOL;
    }
}