<?php
    require_once 'registrar.php';
    $objint= new interes();
    $model = new basedatos();
    $mode = new basedatos();
    if(isset($_REQUEST['editar'])){		
        require_once 'formulario.php';
	$objinter = $model->Obtener($_REQUEST['seleccion']);
    }   	 	 
    if(isset($_REQUEST['eliminar'])){
        $model->Eliminar($_REQUEST['seleccion']);
        header('Location: listado.php');
    }			
    if(isset($_REQUEST['guardar'])){
        if (empty($_POST['cantidad'])) {
            echo ' <script language="javascript">alert("Atencion, campo de id de la habitacion esta vacio");</script> ';
        }
        else{
            $objint->setidhabitacion($_POST['id_habitacion']);
            $objint->setcantidad($_POST['can']);
            $objint->settipohab($_POST['thab']);
            $objint->setacomodacion($_POST['aco']);              
	}
    }
    if(isset($_REQUEST['volver'])){
        header('Location: formulario.php');
    }	
?>
<body>
    <form method='post' action="listado.php" class="pure-form pure-form-stacked" >
	<table table border=1 cellpadding=4 cellspacing=0>
            <thead>
              <tr>
                <th>cantidad</th>
		<th>tipo de habitacion</th>
		<th>acomodacion</th>
            </tr>
            </thead>
			
            </body>
            <tr>
            <?php foreach($model->Listar() as $r): ?>
                <td><?php echo $r->getcantidad('can'); ?></td>              
                <td><?php echo $r->getipohab('thab'); ?></td>
                <td><?php echo $r->getacomodacion('aco'); ?></td>
                    try{
			$sql = $conn->prepare("SELECT * FROM habitaciones WHERE id_habitacion =:idhab");
			$row = $sql->fetchAll(PDO::FETCH_ASSOC);
                    }
                    catch (Exception $e) {            
                        die($e->getMessage());
                    }
                    foreach ($row as $ro)
		?>
            </tr>			
            <?php endforeach; ?>
	</table>
	<table>			 		 
            <td colspan="2" style="text-align:center"><td>
            <p><input type="submit" name="eliminar" value="Eliminar" class="pure-button pure-button-primary"></p>
            </td>
            <td>
            <p><input type="submit" value="Editar" name="editar"class="pure-button pure-button-primary"></p>
            </td>
            <td>
            <p><input type="submit" value="Volver" name="volver"class="pure-button pure-button-primary"></p>
            </td>      
	</table>	
</form> 