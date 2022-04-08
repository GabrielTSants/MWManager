<?php

namespace MWManager\Helpers;

use MWManager\APIS\OMDB;
use MWManager\Controller\InterfaceRequisition;
use MWManager\Model\User;
use MWManager\Model\Item;

class Download implements InterfaceRequisition
{
  private $user;
  private $category;
  private $item;
  
  public function __construct()
  {
    $this->user = new User();
    $this->category = new Item($_POST['target']);
    $this->itemId = $_POST['itemId'];
  }

  public function process()
  {
    switch($_POST['target']){
      case 'movies':
        $api = new OMDB($this->user->getAPI('omdb'));
        $itemName = reset($this->category->getItem($this->itemId))->name;
        //file_put_contents('/tmp/test.txt', print_r($itemName, true));
        $getData = $api->getInfo($itemName);
        $image = $getData['Poster'];
        $this->grabImage($image, __DIR__."/../../public/img/items/movies/$this->itemId.jpg");
        break;
    }
  }

  private function grabImage($url,$saveto)
  {
    $ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($saveto)){
        unlink($saveto);
    }
    $fp = fopen($saveto,'x');
    fwrite($fp, $raw);
    fclose($fp);
  }
}