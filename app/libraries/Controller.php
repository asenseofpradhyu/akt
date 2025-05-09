<?php
/*
   * Base Controller
   * Loads the models and views
   */
class Controller
{
  protected $data = [];

  public function __construct()
  {
    $this->NavigationModel      = $this->model('NavigationModel');
    $this->HomepageModel        = $this->model('HomepageModel');
    $this->data['offer_link']   = $this->HomepageModel->getlinkByTitle('offer_link');
  }

  // Load model
  public function model($model)
  {
    // Require model file
    require_once '../app/models/' . $model . '.php';

    // Instatiate model
    return new $model();
  }

  // Load view
  public function view($view, $data = [])
  {
    if(!isset($data['main_menu'])){
      $data['main_menu'] = $this->NavigationModel->getMainNav();
    }
    if(!isset($data['sub_menu'])){
      $data['sub_menu'] = $this->NavigationModel->getsubnav();
    }
    $data = array_merge($data, $this->data);
    // Check for view file
    if (file_exists('../app/views/' . $view . '.php')) {
      require_once '../app/views/' . $view . '.php';
    } else {
      // View does not exist
      die('View does not exist');
    }
  }

  public function emailTemplate($template_file, $data = []){
    $template_file = '../app/views/' . $template_file . '.php';
    if(file_exists($template_file)){
      $array_keys = array_map(function($key){
        return '#' . $key . '#';
      }, array_keys($data));
      return str_replace($array_keys, array_values($data), file_get_contents($template_file));
    }
    return '';
  }
}
