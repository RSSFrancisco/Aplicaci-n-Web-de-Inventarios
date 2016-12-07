<?php include_once 'funciones/core.php';
 $sql_p="SELECT count(id_producto) FROM tb_productos";
 $sql_v="SELECT count(id_venta) FROM tb_ventas";
 $sql_u="SELECT count(id_usuario) FROM tb_usuarios";
 $sql_b="SELECT count(id_bitacora) FROM tb_bitacora WHERE accion REGEXP 'Inicio'";
 $ejecuta_p=returnTable($sql_p);
 $ejecuta_v=returnTable($sql_v);
 $ejecuta_u=returnTable($sql_u);
 $ejecuta_b=returnTable($sql_b);    
         if ($row_p = mysqli_fetch_row($ejecuta_p)) {
            $productos=trim($row_p[0]);
         }
           if ($row_v = mysqli_fetch_row($ejecuta_v)) {
            $ventas=trim($row_v[0]);
         }
           if ($row_u = mysqli_fetch_row($ejecuta_u)) {
            $usuarios=trim($row_u[0]);
         }
         if ($row_b = mysqli_fetch_row($ejecuta_b)) {
            $bitacora=trim($row_b[0]);
         }
   $product=intval($productos);
   $sales=intval($ventas);
   $users=intval($usuarios);
  $capturas=$product + $sales + $users;
  
?>
<script>   
	var lineChartData = {
			labels : ["Productos","Ventas","Usuarios","Capturas","Entradas"],
			datasets : [
				{
					label: "My Second dataset",
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 1)",
					pointColor : "rgba(48, 164, 255, 1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(48, 164, 255, 1)",
					data : [<?php print($productos);?>,<?php print($ventas);?>,<?php print($usuarios);?>,<?php print($capturas);?>,<?php print($bitacora);?>]
				}
			]
		}
window.onload = function(){
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true
	});
};
</script>