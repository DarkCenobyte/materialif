<?php

namespace Components;

class Renderer
{
  private $smarty;
  private $parent;
  private $isAdmin;

  public function __construct($parent, $isAdmin = false)
  {
    if (isset($parent)) {
      $reflection = new \ReflectionClass($parent);
      $this->parent = $reflection->getShortName();
      $this->isAdmin = $isAdmin;
    }
    $this->smarty = new \Smarty();

    $this->smarty->setTemplateDir(__DIR__ . '/../caches/smarty/templates');
    $this->smarty->setCompileDir(__DIR__ . '/../caches/smarty/templates_c');
    $this->smarty->setCacheDir(__DIR__ . '/../caches/smarty/cache');
    $this->smarty->setConfigDir(__DIR__ . '/../caches/smarty/configs');
  }

  /**
   * Render a view from /view/'controller-name'/$name
   */
  public function render($name, $params = [])
  {
    $this->assignParameters($params);

    $this->smarty->display('views/' .
      'default/' . //@TODO: replace by config from db : template name
      ($this->isAdmin ? 'admin/' : '') .
      strtolower(substr($this->parent, 0, -10)) .
      '/' . $name . '.tpl'
    );
  }

  /**
   * Render a view from a specified filepath
   */
  public function renderFromFile($filepath, $params = [])
  {
    $this->assignParameters($params);

    $this->smarty->display($filepath);
  }

  private function assignParameters($params)
  {
    if (isset($params) && is_array($params)) {
      foreach ($params as $key => $value) {
        $this->smarty->assign($key, $value);
      }
    }
  }

}
