<?php 
namespace WebGobernacion\Http\Controllers;

use Illuminate\Http\Request;
use WebGobernacion\Empresa;
use WebGobernacion\Contrato;
use WebGobernacion\FakeDatabase;
use WebGobernacion\Http\Views\View;

class HomeController
{

    /**
   * @type array
   */
  private $db;

  public function __construct(FakeDatabase $db) {

    $this->db = $db;

  }

  public function index(Request $request)
  {

    $contratos = $this->db->contratos();
    $first = $contratos->first();

    $view = new View('home',[
      'contratos' => $contratos, 
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