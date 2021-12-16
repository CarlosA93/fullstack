<?php
    require_once 'registrar.php'; 
    $objint= new interes();
    $model = new basedatos();	
    if(isset($_REQUEST["cantidad"])) {
        switch($_REQUEST['action']){
            case'actualizar':
                $obj= new interes();
                $moder = new basedatos();
                $obj->setcantidad($_POST['can']);
                $obj->settipohab($_POST['thab']);
                $obj->setacomodacion($_POST['aco']);
                $moder->Registrar($obj2);
                header('Location: listado.php');	
            break;
            case'registrar':
                $obj2= new interes();
                $moder = new basedatos();
                $obj2->setcantidad($_POST['can']);
                $obj2->settipohab($_POST['thab']);
                $obj2->setacomodacion($_POST['aco']);
                $moder->Registrar($obj2);
                header('Location: listado.php');	
            break;
        }
    }	
    if(isset($_REQUEST['editar'])){
        $objint = $model->Obtener($_REQUEST['seleccion']);
    }
?>
<html>
    <head>
        <title>hotel</title>
    </head>
    <body style="background-color: blue;">
        <FORM METHOD="POST" NAME="form" action="?action=<?php echo $objint->id_habitacion > 1 ? 'actualizar' : 'registrar';?>" >
        <input type="hidden" name="id_habitacion" value="<?php echo $objint->getidhabitacion('id_habitacion'); ?>" />       
	<br>
        cantidad<br>
        <INPUT TYPE="TEXT" NAME="cantidad" value="<?php echo $objint->getapellido('apellido');?>"><br>
        tipo de habitacion<br>
        <INPUT TYPE="TEXT" NAME="oficio" value="<?php echo $objint->getoficio('oficio');?>"><br>
        acomodacion<br>
    	<INPUT TYPE="TEXT" NAME="oficio" value="<?php echo $objint->getoficio('oficio');?>"><br>
	       
        <br>
	<br>
        <INPUT TYPE="SUBMIT" name="guardar" value="Guardar">
        </FORM>
    </body>
</html>