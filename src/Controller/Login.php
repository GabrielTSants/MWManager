<?php

namespace MWManager\Controller;

use MWManager\Helpers\Validate;
use MWManager\Helpers\View;
use MWManager\Model\User;

class Login implements InterfaceRequisition
{
  use View;
  use Validate;
  private $user;

  public function __construct()
  {
    $this->user = new User;
  }
  public function process()
  {
    $title = 'Login';
    $login = filter_input(INPUT_POST, 'username', FILTER_UNSAFE_RAW);
    $password = filter_input(INPUT_POST, 'password', FILTER_UNSAFE_RAW);

    if (!$this->validateField($login) || !$this->validateField($password)){
      header('location: /login');
      return;
    }

    $userExist = $this->user->checkLogin($login, $password);
    
    if ($userExist){
      $_SESSION['username'] = $login;
      header('location: /');
      return;
    }
    
    $this->render('login/login.php', compact('title'));
  }
}