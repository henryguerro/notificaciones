<html>
<head>
    <title>Notificaciones</title>
</head>
<body>
    <h1><?= $contratos->getTitulo()?>
        <small><?= $contratos->getFecha() ?></small>
    </h1>
    <p><?= $contratos->getContrato()?></p>
</body>
</html>