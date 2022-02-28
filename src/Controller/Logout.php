<?php

namespace MWManager\Controller;

class Logout implements InterfaceRequisition
{
  public function process()
  {
    session_destroy();
    header('location: /login');
  }
}