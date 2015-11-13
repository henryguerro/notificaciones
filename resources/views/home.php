<!DOCTYPE html>
<html>
<head>
  <title>Notificaciones</title>
  <!-- <link rel="stylesheet" type="text/css" href="../resources/css/style.css"> -->
  <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <table class="tg">
  <tr>
    <th class="tg-hgcj">Fecha</th>
    <th class="tg-amwm">Responsabilidad Social</th>
    <th class="tg-amwm">Contrato</th>
    <th class="tg-amwm">Empresa</th>
  </tr>
  <?php /** @type \WebGobernacion\Contrato[] $contratos */
  foreach ($responsabilidades as $responsabilidad):?>
  <tr>
    <td class="tg-yw4l"><?= $responsabilidad->getFecha() ?></td>
    <td class="tg-yw4l"><?= $responsabilidad->getTitulo() ?></td>
    <td class="tg-yw4l"><?= $responsabilidad->getContrato() ?></td>
    <td class="tg-yw4l"><p><?= $responsabilidad->getEmpresa() ?></p></td>
  </tr>
  <?php  endforeach;?>
</table>
</body>
</html>
