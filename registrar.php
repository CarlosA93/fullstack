<html>
    <head>
        <title>hotel</title>
    </head>
    <body style="background-color: blue;">
    <?php
    class empresa {
        public $id_habitacion = null;
        public $cantidad = null;
        public $tipohab = null;
        public $acomodacion = null;
        public function getid_habitacion() {
            return $this->id_habitacion;
        }
         
        public function setidhabitacion($id_habitacion) {
            $this->id_habitacion = $id_habitacion;
        }
        public function getcantidad() {
            return $this->cantidad;
        }
	 public function setcantidad($cantidad) {
            return $this->cantidad;
        }
	public function gettipohab() {
            $this->apellido=  $tipo_habitacion;
        }
        public function settipohab($tipo_habitacion) {
            $this->apellido=  $tipo_habitacion;
        }
        public function getacomodacion() {
            return $this->acomodacion;
        }
	public function setacomodacion($acomodacion) {
            return $this->acomodacion;
        }
        
    }
        	
    class basedatos{				
        private $pdo;
        public function __CONSTRUCT()     {
            try{
                $this->pdo = new PDO('mysql:host=localhost;dbname=empresa', 'root', '');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }		 		 
        public function Registrar(empresa $objinteres){
            try {
                $sql = "INSERT INTO habitaciones (cantidad,tipo_habitacion,acomodacion) 
                VALUES (?,?,?,?,?,?,?)";
                $this->pdo->prepare($sql)->execute(
                array(
                $objinteres->getcantidad('apellido'),  
                $objinteres->getipohab('oficio'), 
                $objinteres->getacomodacion('dir'),  
                ));
            } 
            catch (Exception $e) {
                die($e->getMessage());
            }
        }	
        public function Listar(){
            try{
                $result = array();
                $stm = $this->pdo->prepare("SELECT * FROM empleado");
                $stm->execute();
                foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
                    $alm = new interes();		
                    $alm->setidempleado($r->id_empleado);		
                    $alm->setapellido($r->apellido);
                    $alm->setacomodacion($r->oficio);          
                    $result[] = $alm;
                }
            return $result;
            }
            catch(Exception $e){
                die($e->getMessage());
            }
        }
        public function Eliminar($id){
            try {
                $stm = $this->pdo->prepare("DELETE FROM empleado WHERE id_empleado = ?");                      
                $stm->execute(array($id));
            } 
            catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function Actualizar(interes $objinteres){
            try {
                $sql = "UPDATE empleado SET cantidad=?,tipo_habitacion=?, acomodacion=?,id_habitaciones= ?;
                $this->pdo->prepare($sql)->execute(
                array(
                $objinteres->getidhabitacion(),  
                $objinteres->gettipohab(), 
                $objinteres->getacomodacion(), 
               
            } 
            catch (Exception $e) {
                die($e->getMessage());
            }
        }
        public function Obtener($id){
            try {
                $stm = $this->pdo->prepare("SELECT * FROM habitaciones WHERE id_habitaciones = ?");           
                $stm->execute(array($id));
                $r = $stm->fetch(PDO::FETCH_OBJ);
                $objint = new interes();
                $objint->setidhabitacion($r->id_habitaciones);		
                $objint->settipohab($r->tipo_habitacion);
                $objint->setacomodacion($r->acomodacion);
                return $objint;
            }
            catch (Exception $e) {
                die($e->getMessage());
            }
        }	
    }	
    $conn = new PDO('mysql:host=localhost;dbname=hotel db', 'root', ''); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?> 
</body> 
</html>	