<?php 
namespace WebGobernacion\Http\Controllers;

use WebGobernacion\Domain\Notificador;
use WebGobernacion\Http\Views\View;

class HomeController
{

  /**
   * @type Notificador
   */
  private $notificador;

  public function __construct(Notificador $notificador) {

    $this->notificador = $notificador;

  }

  public function index()
  {

    $responsabilidades = $this->notificador->listResponsabilidades();
    $first = $responsabilidades->first();

    $view = new View('home',[
      'contratos' => $responsabilidades, 
      'firstContrato' => $first
    ]);

   return $view->render();
  }

   public function show($id)
    {
      $posts = $this->db->posts();

      $view = new View('post_details', [
          'post' => $posts->get($id)
      ]);

      return $view->render();
    }
}