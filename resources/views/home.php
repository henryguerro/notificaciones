<!DOCTYPE html>
<html>
<head>
  <title>Notificaciones</title>
  <link rel="stylesheet" type="text/css" href="../resources/css/style.css">
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
  foreach ($contratos as $contrato):?>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"><?= $contrato->getNombre() ?></td>
    <td class="tg-yw4l"><p><?= $contrato->getEmpresa() ?></p></td>
  </tr>
  <?php  endforeach;?>
</table>
</body>
</html>
