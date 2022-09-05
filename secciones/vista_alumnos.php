<?php include ('../templates/cabecera.php'); ?>
<?php include ('../secciones/alumnos.php');?>
<br>
<br>
<div class="row">
    <div class="col-5">
        <form action="" method="POST">
         <div class="card">
            <div class="card-header">
                Alumnos
            </div>
            <div class="card-body">

            <div class="mb-3 d-none">
              <label for="id" class="form-label"></label>
              <input type="text"
                class="form-control" name="id" value="<?php echo $id; ?>" id="id" aria-describedby="helpId" placeholder="ID">
            </div>
             
            <div class="mb-3">
              <label for="nombre" class="form-label"></label>
              <input type="text"
                class="form-control" name="nombre" value="<?php echo $nombre; ?>" id="nombre" aria-describedby="helpId" placeholder="Nombre de Alumnos">
            </div>

            <div class="mb-3">
              <label for="apellido" class="form-label"></label>
              <input type="text"
                class="form-control" name="apellido" id="apellido" value="<?php echo $apellido; ?>" aria-describedby="helpId" placeholder="Apillodo de Alumnos">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Cursos del alumno:</label>
                <select multiple class="form-select" name="cursos[]" id="cursos">
                   <?php foreach ($listaCursos as $curso) { ?>
                        <option
                            <?php
                            if(!empty($cursos)):
                                if(in_array($curso['idcurso'],$cursos)):
                                    echo 'selected';
                                endif;
                            endif;
                            ?>
                         value="<?php echo $curso['idcurso']; ?>">
                         <?php echo $curso['nombre_cursos']; ?>
                        </option>
                        
                     <?php } ?>
                </select>
            </div>
                
              <div class="btn-group" role="group" aria-label="">
              <button type="submit" name="accion" value="agregar" class="btn btn-success">Agregar</button>
              <button type="submit" name="accion" value="editar" class="btn btn-warning">Editar</button>
              <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
              </div>

            </div>
        
         </div>
        </form>
    </div>
    <div class="col-7">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cursos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($listaAlumnos as $alumno) { ?>
            <tr>
                <td><?php echo $alumno['idalumnos']; ?></td>
                <td><?php echo $alumno['nombre']; ?></td>
                <td><?php echo $alumno['apellido']; ?></td>
                <td>
                    <?php foreach ($alumno['cursos'] as $curso) { ?>
                      <a href="certificado.php?idcurso=<?php echo $curso['idcurso'];?> &idalumnos=<?php echo $alumno['idalumnos'];?>">
                      <img src="../img/pdf.png" width="32" height="32" >
                      <br> <?php echo $curso['nombre_cursos']; ?>
                    </a><br>
                    <?php } ?>
                </td>
                <td>

                <form action="" method="post">
               <input type="hidden" name="id" value="<?php echo $alumno['idalumnos'];?>">
               <button type="submit" name="accion" value="Seleccionar" class="btn btn-info">Seleccionar</button> 
               </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
    </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.1.0/dist/js/tom-select.complete.min.js"></script>
<script>
    new TomSelect('#cursos');

</script>
<?php include ('../templates/pie.php');?>