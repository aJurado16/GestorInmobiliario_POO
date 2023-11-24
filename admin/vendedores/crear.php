<?php
    require '../../includes/app.php';

    use App\Vendedor;

    estaAutenticado();

    $vendedor = new Vendedor;

    // Arreglo con mensajes de errores
    $errores = Vendedor::getErrores();

    // Ejecutar el codigo despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // Crear una nueva instancia
        $vendedor = new Vendedor($_POST['vendedor']);

        $errores = $vendedor->validar();

        if(empty($errores)){
            $vendedor->guardar();


        }
    }

    // Incluye un template
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Registrar Nuevo Vendedor(a)</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error):  ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form action="/admin/vendedores/crear.php" class="formulario" method="POST">
            <?php include '../../includes/templates/formulario_vendedores.php' ?>

            <input type="submit" name="" id="" value="Registrar Vendedor(a)" class="boton boton-verde">
        </form>

    </main>

<?php
    incluirTemplate('footer');
?>