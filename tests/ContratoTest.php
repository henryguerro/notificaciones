<?php 
/**
* 
*/
use \Notificaciones\Domain\Contrato;
use \Notificaciones\Domain\Empresa;

class ContratoTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @test
	 */
	function it_should_be_able_to_construct()
	{

		$empresa = new Empresa("Empresa Probadora");

		$contrato = new Contrato(
			$empresa, 
			999, 
			"Contrato Probadero"
		);

		$this->assertInstanceOf(Contrato::class,$contrato);
	}
	/**
	 * @test
	 */
	public function it_return_name()
	{
		$empresa = new Empresa("Empresa Probadora");

		$contrato = new Contrato(
			$empresa, 
			999, 
			"Contrato Probadero"
		);
		$name = $contrato->getTitulo();
		$this->assertEquals('Contrato Probadero', $name);
	}
		/**
	 * @test
	 */
		public function it_return_provider()
	{
		$empresa = new Empresa("Empresa Probadora");

		$contrato = new Contrato(
			$empresa, 
			999, 
			"Contrato Probadero"
		);
		$name = $contrato->getEmpresa();
		$this->assertEquals('Empresa Probadora', $name);
	}
}