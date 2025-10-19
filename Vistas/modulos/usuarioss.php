<!--INICIO del cont principal-->
<div class="container">
    <h1>Gestor de Usuarios del Sistema</h1>
 <?php

include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, libreta, nombre, apellido, dni, rol, clave FROM usuarios WHERE usu=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevou" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>usuario</th>
                                <th>nombre</th>
                                <th>apellido</th>
                                <th>dni</th>
                                <th>Rol</th>                                
                                <th>Clave</th>  
                                <th>Acciones/Tareas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['libreta'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['apellido'] ?></td>
                                <td><?php echo $dat['dni'] ?></td>
                                <td><?php echo $dat['rol'] ?></td>
                                <td><?php echo $dat['clave'] ?></td>    
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    

      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUDU" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="form-group">
                <label for="libreta" class="col-form-label">Usuario:</label>
                <input type="text" class="form-control" id="libreta">
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                <label for="apellido" class="col-form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido">
                </div>
                <div class="form-group">
                <label for="dni" class="col-form-label">Dni:</label>
                <input type="text" class="form-control" id="dni">
                </div>                                
                <div class="form-group">
                <label for="clave" class="col-form-label">Clave:</label>
                <input type="text" class="form-control" id="clave">
                </div>                
                <div class="form-group">
    			    <label for="rol" class="col-form-label">Seleccionar Rol:</label>
						<select class="styled-select" id="rol" required>
                            <optgroup>
                                <option>Seleccionar Rol...</option>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Docente">Docente</option>
                                <option value="Bedel">Bedel</option>
                             </optgroup>
                        </select> 
				</div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->