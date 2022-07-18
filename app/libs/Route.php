<?php

class Route
{
  public $path;
  public $controller;
  public $method;

  public function __construct($path, $controller, $method)
  {
    $this->path = $path;
    $this->controller = $controller;
    $this->method = $method;
  }
}