<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h2>LISTADO DE PRODUCTOS</h2>

        <?php if(!empty($listaProd) && is_array($listaProd)): ?>
            <ul>
            <?php foreach($listaProd as $producto): ?>
                <div>       
                    <li type="disc"><?php echo $producto['idProducto'].", ".$producto['producto'].", ".$producto['stock'].", ".$producto['precio']; ?></li>
                </div>
            <?php endforeach; ?>
            </ul>
        <?php endif;?>
    </body>
</html>