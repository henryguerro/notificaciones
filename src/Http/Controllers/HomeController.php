<?php
namespace Notificaciones\Http\Controllers;

use Notificaciones\Domain\Notificador;
use Notificaciones\Http\Views\View;

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
      'responsabilidades' => $responsabilidades, 
      'firstResponsabilidad' => $first
    ]);

   return $view->render();
  }

   public function show($id)
    {
      $responsabilidad = $this->notificador->findById($id);

      $view = new View('home', [
          'responsabilidades' => $responsabilidad
      ]);

      return $view->render();
    }
}