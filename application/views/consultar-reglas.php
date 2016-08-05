<html>
<body>
    <h1>
        Reglas
    </h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
        </tr>
        <?php foreach($reglas as $item): ?>
            <tr>
                <td> <?php echo $item['nombre']; ?></td>
                <td> <?php echo $item['descripcion']; ?> </td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>