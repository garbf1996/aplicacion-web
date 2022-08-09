<?php include ('../templates/cabecera.php'); ?>
<?php include ('../secciones/cursos.php');?>
<div class="row">
    <div class="col-5">
        <form action="" method="">
         <div class="card">
            <div class="card-header">
                Alumnos
            </div>
            <div class="card-body">

            <div class="mb-3">
              <label for="id" class="form-label"></label>
              <input type="text"
                class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID">
            </div>
             
            <div class="mb-3">
              <label for="nombre" class="form-label"></label>
              <input type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre de Alumnos">
            </div>

            <div class="mb-3">
              <label for="apillodo" class="form-label"></label>
              <input type="text"
                class="form-control" name="apillodo" id="apillodo" aria-describedby="helpId" placeholder="Apillodo de Alumnos">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Cursos del alumno:</label>
                <select multiple class="form-select" name="cursos[]" id="cursos">
                    <option selected>Selecione</option>
                    <option value="">New Delhi</option>
                    <option value="">Istanbul</option>
                    <option value="">Jakarta</option>
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    
    </div>
    </div>
</div>

<?php include ('../templates/pie.php');?>