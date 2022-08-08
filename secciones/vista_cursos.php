<?php include ('../templates/cabecera.php');?>
<?php include ('../secciones/cursos.php');?>
    <div class="row">
      <div class="col-12">
          <br>
    <div class="row">
<div class="col-md-5">
  
    <form action="" method="Post">
    <div class="card">
    <div class="card-header">
         Cursos
</div>
 <div class="card-body">
<div class="mb-3">
  <label for="id" class="form-label">ID</label>
  <input type="text"
    class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID">
</div>

<div class="mb-3">
  <label for="nombre_curso" class="form-label">Nombre de curso</label>
  <input type="text"
    class="form-control" name="nombre_curso" id="nombre_curso" aria-describedby="helpId" placeholder="Nombre del curso">
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

  <div class="col-md-7">

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre de curso</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <td>1</td>
      <td>Aplicacion web</td>
      <td>Selecionar</td>
    </tr>
  </tbody>
</table>

</div>

</div>
</div>
</div>




<?php include ('../templates/pie.php');?>