$(document).ready(function(){
    tablaUsuarios2 = $("#tablaUsuarios2").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<button class='btn btn-primary btnEditaru2'>Editar</button>"  
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
    

    

var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditaru2", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    fecha = fila.find('td:eq(1)').text();
    cuit = fila.find('td:eq(2)').text();
    correo = fila.find('td:eq(3)').text();
    direccion = fila.find('td:eq(4)').text();
    telefono = fila.find('td:eq(5)').text();
    cohorte = fila.find('td:eq(7)').text();
    usu = fila.find('td:eq(8)').text(); 
    estado = fila.find('td:eq(6)').text();

    $("#fecha").val(fecha);
    $("#cuit").val(cuit);
    $("#correo").val(correo);
    $("#direccion").val(direccion);
    $("#telefono").val(telefono);
    $("#cohorte").val(cohorte);
    $("#estado").val(estado);
    $("#usu").val(usu);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Estudiante");            
    $("#modalCRUDU2").modal("show");  
    
});

$("#formUsuarios2").submit(function(e){
    e.preventDefault();    
    fecha = $.trim($("#fecha").val());
    cuit = $.trim($("#cuit").val());
    correo = $.trim($("#correo").val());
    direccion = $.trim($("#direccion").val());            
    telefono = $.trim($("#telefono").val());
    cohorte = $.trim($("#cohorte").val());
    estado = $.trim($("#estado").val());
    usu = $.trim($("#usu").val());

    $.ajax({
        url: "bd/crudu2.php",
        type: "POST",
        dataType: "json",
        data: {fecha:fecha, cuit:cuit, correo:correo, direccion:direccion, telefono:telefono, cohorte:cohorte, estado:estado, usu:usu, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            fecha = data[0].fecha;
            cuit = data[0].cuit;
            correo = data[0].correo;
            direccion = data[0].direccion;
            telefono = data[0].telefono;
            cohorte = data[0].cohorte;
            estado = data[0].estado;
            usu = data[0].usu;
            
            if(opcion == 1){tablaUsuarios2.row.add([id,fecha,cuit,correo,direccion,telefono,estado,cohorte,usu]).draw();}
            else{tablaUsuarios2.row(fila).data([id,fecha,cuit,correo,direccion,telefono,estado,cohorte,usu]).draw();}            
        }        
    });
    $("#modalCRUDU2").modal("hide");    
    
});
    
//   $("#formUsuarios2").submit(function(e){
//     e.preventDefault();    
//     fecha = $.trim($("#fecha").val());
//     cuit = $.trim($("#cuit").val());
//     correo = $.trim($("#correo").val());
//     direccion = $.trim($("#direccion").val());            
//     telefono = $.trim($("#telefono").val());
//     cohorte = $.trim($("#cohorte").val());
//     estado = $.trim($("#estado").val());
//     usu = $.trim($("#usu").val());
        
//     $.ajax({
//         url: "bd/crudu2.php",
//         type: "POST",
//         dataType: "json",
//         data: {fecha:fecha, cuit:cuit, correo:correo, direccion:direccion, telefono:telefono, cohorte:cohorte, estado:estado, usu:usu, id:id, opcion:opcion},
//         success: function(data){  
//             console.log(data);
//             id = data[0].id;            
//             fecha = data[0].fecha;
//             cuit = data[0].cuit;
//             correo = data[0].correo;
//             direccion = data[0].direccion;
//             telefono = data[0].telefono;
//             cohorte = data[0].cohorte;
//             estado = data[0].estado;
//             usu = data[0].usu;
//             if(opcion == 1){tablaUsuarios2.row.add([id,fecha,cuit,correo,direccion,telefono,cohorte,estado,usu]).draw();}
//             else{tablaUsuarios2.row(fila).data([id,fecha,cuit,correo,direccion,telefono,cohorte,estado,usu]).draw();}            
//         }        
//     });
//     $("#modalCRUDU2").modal("hide");    
    
 //});


});