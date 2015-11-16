<?php 
/**
* 
*/
use \Notificaciones\Http\Views\View;

class ViewTest extends PHPUnit_Framework_TestCase
{

  /**
   * @test
   */
  function it_should_be_able_to_construct()
  {
    $view  = new View('home',['message'=>'hola mundo']);
    $this->assertInstanceOf(View::class,$view);
  }

  /**
   * @test
   */
  public function it_return_template()
  {
    $view  = new View('home',['message'=>'hola mundo']);
    //$view->render();
    //$view;

  }

  /**
   * @test
   */
/*  public function it_return_params()
  {
    $view  = new View('home',['message'=>'hola mundo']);
    $view->includeTemplateFile('D:/xampp/htdocs/DESARROLLO/notificaciones/resource/views/home.php',
      ["message"=>"hey"]);
    $view;
  }
*/
}
