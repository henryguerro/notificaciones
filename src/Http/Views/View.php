<?php 
namespace WebGobernacion\Http\Views;
use \Illuminate\Http\Response;

/**
* 
*/
class View
{
  /**
   * @type string
   */
  private $template;
  
  /**
   * @type array
   */
  private $params;

  public function __construct($template,array $params = [])
  {
    $this->template = $template;
    $this->params = $params;
  }

  /**
   * @return Response
   */
  public function render()
  {
    $content = $this->loadTemplate();

    $response = new Response($content);
    return $response;
  }

  private function loadTemplate()
  {
    $path = dirname(dirname(dirname(__DIR__))).
    '/resources/views';

    $templatePath = "$path/{$this->template}.php";

    return $this->includeTemplateFile(
      $templatePath, 
      $this->params
      );
  }


  private function includeTemplateFile($path,$params)
  {
    if (file_exists($path)) {

      extract($params);
      return include $path;

    }else{

      $archivo=$this->template.".php";

      throw new \InvalidArgumentException(
        "No existe el archivo: [$archivo]"
      );

    }
  }
}