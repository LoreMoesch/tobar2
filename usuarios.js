$(document).ready(function(){
    tablaUsuarios = $("#tablaUsuarios").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><button class='btn btn-primary btnEditaru'>Editar</button><button class='btn btn-danger btnBorraru'>Borrar</button></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevou").click(function(){
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Usuario");            
    $("#modalCRUDU").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditaru", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    libreta = fila.find('td:eq(1)').text();
    nombre = fila.find('td:eq(2)').text();
    apellido = fila.find('td:eq(3)').text();
    dni = fila.find('td:eq(4)').text();
    clave = fila.find('td:eq(6)').text();
    rol = fila.find('td:eq(5)').text();
    
    $("#libreta").val(libreta);
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#dni").val(dni);
    $("#clave").val(clave);
    $("#rol").val(rol);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Usuario");            
    $("#modalCRUDU").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorraru", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crudu.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaUsuarios.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formUsuarios").submit(function(e){
    e.preventDefault();    
    libreta = $.trim($("#libreta").val());
    nombre = $.trim($("#nombre").val());
    apellido = $.trim($("#apellido").val());
    dni = $.trim($("#dni").val());            
    clave = $.trim($("#clave").val());
    rol = $.trim($("#rol").val());    
    $.ajax({
        url: "bd/crudu.php",
        type: "POST",
        dataType: "json",
        data: {libreta:libreta, nombre:nombre, apellido:apellido, dni:dni, rol:rol, clave:clave, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            libreta = data[0].libreta;
            nombre = data[0].nombre;
            apellido = data[0].apellido;
            dni = data[0].dni;
            rol = data[0].rol;
            clave = data[0].clave;
            if(opcion == 1){tablaUsuarios.row.add([id,libreta,nombre,apellido,dni,rol,clave]).draw();}
            else{tablaUsuarios.row(fila).data([id,libreta,nombre,apellido,dni,rol,clave]).draw();}            
        }        
    });
    $("#modalCRUDU").modal("hide");    
    
});
});