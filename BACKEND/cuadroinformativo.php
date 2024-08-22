<?php
$servername = "localhost:3307";
$database = "metodo";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 ?>


<div class="row">
    <div class="col-sm-12">
    <br>
    <h2>RECEPCIÓN DE DATOS</h2>

    <table class="table table-hover table-condensed table-bordered">
            <tr>
            <th>id</th>
                <td>NOMBRE</td>
                <td>DESCRIPCION</td>
                <td >GENERO</td>
                <td>AÑO</td>
                <td>DURACION</td>
                <td>IMAGEN</td>
                <td>VIDEO</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>

            <?php
            if(isset($_SESSION['consulta'])){
                    if($_SESSION['consulta'] > 0){
                        $idp=$_SESSION['consulta'];

                        $sql="SELECT id,nombrepelicula,descripcionpelicula,generopelicula,fechapelicula,duracionpelicula,imagenpelicula,videopelicula   
                        from metodo where id='$idp'";
                    }else{
                        $sql="SELECT id,nombrepelicula,descripcionpelicula,generopelicula,fechapelicula,duracionpelicula,imagenpelicula,videopelicula   
                        from metodo";
                    }
                }else{
                    $sql="SELECT id,nombrepelicula,descripcionpelicula,generopelicula,fechapelicula,duracionpelicula,imagenpelicula,videopelicula   
                        from metodo";
                }


                $result=mysqli_query($conn,$sql);
                while($ver=mysqli_fetch_row($result)){

                    $datos=$ver[0]."||".
                           $ver[1]."||".
                           $ver[2]."||".
                           $ver[3]."||".
                           $ver[4]."||".
                           $ver[5]."||".
                           $ver[6]."||".
                           $ver[7];
             ?>

           
            <tr>
                <td><?php echo $ver[0] ?></td>
                <td><?php echo $ver[1] ?></td>
                <td><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td><?php echo $ver[4] ?></td>
                <td><?php echo $ver[5] ?></td>
                <td><?php echo $ver[6] ?></td>
                <td><?php echo $ver[7] ?></td>
           
                <td>
                    <button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#abrir" onclick="agregaform('<?php echo $datos ?>')">
                    </button>
                </td>
           
            <td>
                    <button class="btn btn-danger glyphicon glyphicon-remove"
                    onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
                    </button>
                    </td>
            </tr>


           
           
            <?php
        }
             ?>
        </table>
    </div>
</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

<!-- Modal para edicion de datos -->
<div class="modal fade" id="abrir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
        <form id="formclientes">
          <label>ID</label>
          <input type="text" id="id">
         
          <label>NOMBRE</label>
          <input type="text" id="nombrepelicula">
 
          <label>DESCRIPCION</label>
          <input type="text" id="descripcionpelicula">
         
          <label>GENERO</label>
          <input type="text" id="generopelicula">    
 
          <label>AÑO</label>
          <input type="text" id="fechapelicula">

          <label>AÑO</label>
          <input type="text" id="duracionpelicula">

          <label>IMAGEN</label>
          <input type="text" id="imagenpelicula">

          <label>VIDEO</label>
          <input type="text" id="videopelicula">
 
          <button  id="btn" >ACTUALIZAR </button>
        </form>

      </div>
     
      <div class="modal-footer">    
       
     
      </div>
   
    </div>
  </div>
</div>