<fieldset>
    <legend>Informacion General</legend>

    <label for="Nombre">Nombre:</label>
    <input type="text" name="vendedor[nombre]" id="nombre" placeholder="Nombre Vendedor(a)" value='<?php echo s($vendedor->nombre) ?>'>

    <label for="apellido">Apellido:</label>
    <input type="text" name="vendedor[apellido]" id="apellido" placeholder="Apellido Vendedor(a)" value='<?php echo s($vendedor->apellido); ?>'>

    <label for="telefono">Telefono:</label>
    <input type="text" name="vendedor[telefono]" id="telefono" placeholder="Telefono Vendedor(a)" value='<?php echo s($vendedor->telefono); ?>'>
</fieldset>




