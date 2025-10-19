<!--INICIO del cont principal-->
<div class="container">
    <h1>Datos y condicion de Estudiantes</h1>
<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$consulta = "SELECT id,fecha,cuit,correo,direccion,telefono,estado,cohorte,usu FROM usuarios WHERE rol='Estudiante'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<br>  
<div class="container-fluid">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaUsuarios2" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Fechanac</th>
                                <th>cuit</th>
                                <th>correo</th>
                                <th>domicilio</th>
                                <th>telefono</th>
                                <th>estado</th>
                                <th>cohorte</th>
                                <th>activo</th>                                     
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['fecha'] ?></td> 
                                <td><?php echo $dat['cuit'] ?></td>
                                <td><?php echo $dat['correo'] ?></td>
                                <td><?php echo $dat['direccion'] ?></td>
                                <td><?php echo $dat['telefono'] ?></td>
                                <td><?php echo $dat['estado'] ?></td>
                                <td><?php echo $dat['cohorte'] ?></td>
                                <td><?php echo $dat['usu'] ?></td>
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
<div class="modal fade" id="modalCRUDU2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios2">    
            <div class="modal-body">

                <div class="form-group">
                <label for="fecha" class="col-form-label">Fecha Nac:</label>
                <input type="date" class="form-control" id="fecha">
                </div> 
                <div class="form-group">
                <label for="cuit" class="col-form-label">Cuit:</label>
                <input type="text" class="form-control" id="cuit">
                </div>
                <div class="form-group">
                <label for="correo" class="col-form-label">Correo:</label>
                <input type="text" class="form-control" id="correo">
                </div>
                <div class="form-group">
                <label for="direccion" class="col-form-label">Domicilio:</label>
                <input type="text" class="form-control" id="direccion">
                </div>
                <div class="form-group">
                <label for="telefono" class="col-form-label">Telefono:</label>
                <input type="text" class="form-control" id="telefono">
                </div>                                
                <div class="form-group">
                <label for="cohorte" class="col-form-label">Cohorte:</label>
                <input type="text" class="form-control" id="cohorte">
                </div> 

                <div class="form-group">
    			    <label for="estado" class="col-form-label">Seleccionar Estado:</label>
						<select class="styled-select" id="estado">
                            <optgroup>
                                <option value="Regular">Regular</option>
                                <option value="Abandono">Abandono</option>
                                <option value="Recibido">Recibido</option>
                             </optgroup>
                        </select> 
				</div>
                <div class="form-group">
    			    <label for="usu" class="col-form-label">Seleccionar Estado Usuario: </label>
						<select class="styled-select" id="usu" required>
                            <optgroup>
                                <option value="1">1</option>
                                <option value="0">0</option>
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