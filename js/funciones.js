function buscarInformacion(){
   var busqueda;
    busqueda=$("#txtBuscando").val();
    $.ajax({
            type: "POST",
            url: "funciones/motor_busqueda.php",
            data: "cadena=" + busqueda,
            dataType: "html",
            beforeSend: function () {
                //imagen de carga
                $("#resultadoBusqueda").html("<p align='center'><img src='imagenes/loader.gif' /> Buscando...</p>");
            },
            success: function (datos) {
                $("#resultadoBusqueda").empty();
                $("#resultadoBusqueda").append(datos).fadeOut("fast").show("slow");
               

            }
        });
}
$("#txtBuscando").on("change",buscarInformacion);
function nuevo_producto(){
	 $.get('view/nuevo_producto.php', function (datos) {
        $("#contenido").empty();
        $("#contenido").append(datos);
        $('html,body').animate({
            scrollTop: $("#contenido").offset().top
        }, 500);
    });
}
 function logearse() {
        usuario = $("#txtUsuario").val();
        if (usuario == "") {
            $("#txtUsuario").focus();
        }
        contrasenia = $("#txtContrasenia").val();
        if (contrasenia == "") {
            $("#txtContrasenia").focus();
        }
        $.ajax({type: "POST", url: "funciones/logearse.php", data: "u=" + usuario + "&c=" + contrasenia, dataType: "html", beforeSend: function () {
                $("#resultadoB").html("<p align='center'><img src='imagenes/loader.gif' /> Verificando usuario...</p>");
            },
            error: function () {
                alert("error petición ajax");
            }, success: function (datos) {
                if (datos == 1) {
                    window.location = "index.php";
                } else {
                    $("#resultadoB").empty();
                    $("#resultadoB").append(datos);
                }
            }});
    }
function listar_productos_venta(clave){
   $.ajax({
        type: "POST",
        url: "view/listar_productos_venta.php",
        data: "id_venta="+clave,
        dataType: "html",
        beforeSend: function () {
            $(".listadoProductosVenta").html("<p align='center'><img src='imagenes/loader.gif' /> Consultando...</p>");
        },
        success: function (datos) {

            $(".listadoProductosVenta").empty();
            $(".listadoProductosVenta").append(datos).fadeOut("fast").show("slow");
            $('html,body').animate({
                scrollTop: $(".listadoProductosVenta").offset().top
            }, 500);

        }
    });
}
function agregar_producto_venta(clave,precio){
    id_producto=$('#cmbProducto').val();
    cantidad=$('#txtCantidad').val();
    if(id_producto===''||cantidad===''||precio===''){
        $("#resultadoC").html("<div class='alert alert-success alert-dismissable msAlerta mTransicion'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Por favor seleccione el producto o ingrese la cantidad </div>");
    }else{
          $.ajax({
        type: "POST",
        url: "funciones/guardar_productos_venta.php",
        data: "id_producto=" + id_producto+"&cantidad="+cantidad+"&id_venta="+clave+"&precio="+precio,
        dataType: "html",
        beforeSend: function () {
            $("#resultadoC").html("<p align='center'><img src='imagenes/loader.gif' /> Agregando producto...</p>");
        },
        success: function (datos) {

            $("#resultadoC").empty();
            $("#resultadoC").append(datos).fadeOut("fast").show("slow");
            $('html,body').animate({
                scrollTop: $("#resultadoC").offset().top
            }, 500);
           listar_productos_venta(clave);
           total_venta(clave);
        }
    });
    }
}
function guardar_venta(){
    factura=$("#txtFactura").val();
    cliente=$("#txtCliente").val();
    costo_molde=$("#txtCostoMolde").val();
    costo_materiales=$("#txtCostoMateriales").val();
    costo_horno=$("#txtCostoHorno").val();
    costo_prensa=$("#txtCostoPrensa").val();
    if(factura===''||cliente===''||costo_molde===''||costo_materiales===''||costo_horno===''||costo_prensa===''){
             $("#resultadoC").html("<div class='alert alert-warning alert-dismissable msAlerta mTransicion'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Por favor llene los campos necesarios para el registro de sus datos en el sistema</div>");
    }else{
        $.ajax({
        type: "POST",
        url: "funciones/guardar_venta.php",
        data: "factura=" + factura +"&cliente="+cliente+"&costo_molde="+costo_molde+"&costo_materiales="+
        costo_materiales+"&costo_horno="+costo_horno+"&costo_prensa="+costo_prensa,
        dataType: "html",
        beforeSend: function () {
            $("#resultadoC").html("<p align='center'><img src='imagenes/loader.gif' /> Guardando...</p>");
        },
        success: function (datos) {

            $("#resultadoC").empty();
            $("#resultadoC").append(datos).fadeOut("fast").show("slow");
            $('html,body').animate({
                scrollTop: $("#resultadoC").offset().top
            }, 500);
           setInterval(function () {
                    window.location = "index.php?view_action=add_products_sale&identifier=?";
                }, 100);
        }
    });
    }

}
function actualizar_usuario(clave){
    nombre=$("#txtNombre").val();
    usuario=$("#txtUsuario").val();
    tipo=$("#txtTipo").val();
    correo=$("#txtCorreo").val();
    telefono=$("#txtTelefono").val();
    contrasenia=$("#txtContrasenia").val();


     $.ajax({
        type: "POST",
        url: "funciones/actualizar_usuario.php",
        data: "nombre=" + nombre + "&usuario="+ usuario+"&tipo="+ tipo +"&correo="+correo+"&telefono="+telefono+"&contrasenia="+contrasenia+"&clave="+clave,
        dataType: "html",
        beforeSend: function () {
            $("#resultadoC").html("<p align='center'><img src='imagenes/loader.gif' /> Guardando usuario   " + usuario + "</p>");
        },
        success: function (datos) {

            $("#resultadoC").empty();
            $("#resultadoC").append(datos).fadeOut("fast").show("slow");
            $('html,body').animate({
                scrollTop: $("#resultadoC").offset().top
            }, 500);

        }
    });

}
function eliminar_venta(clave){
        if (confirm("Mensaje de confirmacion.\n ¿Desea Eliminar Este registro?")) {
             $.post("funciones/eliminar_venta.php",{key: clave },function(data){
             $("#resultadoE").html(data);
                 setInterval(function () {
                         window.location = "index.php?view_action=list_sale&identifier=?";
                 }, 3000);
                });
        } else {
                alert("La accion ha sido cancelada");
                 return false;
        }
}
function eliminar_producto(clave){
		 if (confirm("Mensaje de confirmacion.\n ¿Desea Eliminar Este registro?")) {
			 $.post("funciones/eliminar_producto.php",{key: clave },function(data){
		  	 $("#resultadoC").html(data);
				 setInterval(function () {
						 window.location = "index.php?view_action=list_products&identifier=?";
				 }, 3000);
		  		});
		 } else {
				 alert("La accion ha sido cancelada");
				 return false;
		 }
}
function eliminar_producto_venta(id_producto,id_venta){
   if (confirm("Mensaje de confirmacion.\n ¿Desea Eliminar Este registro?")) {
        $.ajax({
            type: "POST",
            url: "funciones/eliminar_producto_venta.php",
            data: "key_producto=" + id_producto+"&key_venta="+id_venta,
            dataType: "html",
            beforeSend: function () {
                //imagen de carga
                $("#resultadoC").html("<p align='center'><img src='imagenes/loader.gif' /> Eliminando...</p>");
            },
            success: function (datos) {

                $("#resultadoC").empty();
                $("#resultadoC").append(datos).fadeOut("fast").show("slow");
               listar_productos_venta(id_venta);

            }
        });
    } else {
        alert("La accion ha sido cancelada");
        return false;
    }
}
function eliminar_usuario(clave) {
    if (confirm("Mensaje de confirmacion.\n ¿Desea Eliminar Este registro?")) {
        $.ajax({
            type: "POST",
            url: "funciones/eliminar_usuario.php",
            data: "clave=" + clave,
            dataType: "html",
            beforeSend: function () {
                //imagen de carga
                $("#resultadoC").html("<p align='center'><img src='imagenes/loader.gif' /> Eliminando...</p>");
            },
            success: function (datos) {

                $("#resultadoC").empty();
                $("#resultadoC").append(datos).fadeOut("fast").show("slow");
                $('html,body').animate({
                    scrollTop: $("#resultadoC").offset().top
                }, 500);
                setInterval(function () {
                    window.location = "index.php?view_action=list_users&identifier=?";
                }, 2000);
            }
        });
    } else {
        alert("La accion ha sido cancelada");
        return false;
    }
}
function guardar_usuario(){
    nombre=$("#txtNombre").val();
    usuario=$("#txtUsuario").val();
    tipo=$("#txtTipo").val();
    correo=$("#txtCorreo").val();
    telefono=$("#txtTelefono").val();
    contrasenia=$("#txtContrasenia").val();
    repetir_contrasenia=$("#txtRepetir").val();

    if(nombre===''||usuario===''||tipo===''||contrasenia===''||repetir_contrasenia===''){
          $("#resultadoC").html("<div class='alert alert-warning alert-dismissable msAlerta mTransicion'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>'Por favor llene los campos que son requeridos para registrar sus datos '</div>");
    }
    else if(contrasenia!=repetir_contrasenia){
    	  $("#resultadoC").html("<div class='alert alert-warning alert-dismissable msAlerta mTransicion'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>'La contraseña que usted ingreso no coincide con la que escribio en el campo repetir contraseña'</div>");

    }
    else{
     $.ajax({
        type: "POST",
        url: "funciones/guardar_usuario.php",
        data: "nombre=" + nombre + "&usuario="+ usuario +"&tipo="+ tipo +"&correo="+ correo +"&telefono="+ telefono +"&contrasenia="+ contrasenia,
        dataType: "html",
        beforeSend: function () {
            $("#resultadoC").html("<p align='center'><img src='imagenes/loader.gif' /> Guardando usuario   " + usuario + "</p>");
        },
        success: function (datos) {

            $("#resultadoC").empty();
            $("#resultadoC").append(datos).fadeOut("fast").show("slow");
            $('html,body').animate({
                scrollTop: $("#resultadoC").offset().top
            }, 500);

        }
    });
 }
}
function total_venta(key){
    $.ajax({
        type: "POST",
        url: "funciones/total_venta.php",
        data: "key=" + key,
        dataType: "html",
        success: function (datos) {

            $("#btnTotal").empty();
            $("#btnTotal").append(datos);
            $('html,body').animate({
                scrollTop: $("#btnTotal").offset().top
            }, 500);

        }
    });
}
function finalizar_venta(clave){
	var total_venta=$("#btnTotal").text();
	$.post("funciones/finalizar_venta.php",{total: total_venta,key: clave },function(data){
		$("#resultadoC").html(data);
 	 setInterval(function () {
 			 window.location = "index.php?view_action=list_sale&identifier=?";
 	 }, 1000);
     });
 }
 setInterval(function () {
	 var opcion=1;
	 $.post("funciones/ajax_panel.php",{key: opcion },function(data){
		 $("#cssPanelProductos").html(data);
			});
 }, 3000);
 setInterval(function () {
 	var opcion=2;
 	$.post("funciones/ajax_panel.php",{key: opcion },function(data){
 		$("#cssPanelVentas").html(data);
 		 });
 }, 3000);
 setInterval(function () {
  var opcion=3;
  $.post("funciones/ajax_panel.php",{key: opcion },function(data){
 	 $("#cssPanelUsuarios").html(data);
 		});
 }, 3000);
 setInterval(function () {
  productos=$("#cssPanelProductos").text();
	ventas=$("#cssPanelVentas").text();
	usuarios=$("#cssPanelUsuarios").text();
	total=parseFloat(productos) + parseFloat(ventas) + parseFloat(usuarios);
	$("#cssPanelCapturas").text(total);
}, 4000);
  $( document ).ready(function() {
        clave=$("#idDetalleVenta").text();
   listar_productos_venta(clave);
    });
    
