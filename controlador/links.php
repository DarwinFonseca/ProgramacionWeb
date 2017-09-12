<?php

class links{

    private $Tipo2;
    private $Tipo3;
    private $Tipo4;
    private $Label;

function links(){

  $this->Label="<label>Id del usuario:</label><br><input type='text' name='id_usuario' /><br>";
  $this->Tipo3="<a href='../registro.php'>Crear Usuario</a><br>";
  $this->Tipo2="<input type='submit' value='Editar usuario' id='btnEditar' name='btnEditar' />";
  $this->Tipo4="<input type='submit' value='Eliminar usuario' id='btnEliminar' name='btnEliminar' />";

}

function MostrarLinks(){

echo <<< HTML

<form action="../controlador/control.php" method="POST">
  <p>
HTML;

        if (isset($_SESSION['rol'])) {
          if ($_SESSION['rol']=='1') {
            echo "Sólo puede ver los datos.";
          }else {
            if ($_SESSION['rol']=='2' ) {
              echo $this->Label ."". $this->Tipo2;
            }else {
              if ($_SESSION['rol']=='3') {
                echo $this->Tipo3 ."". $this->Label ."". $this->Tipo2;
              }else {
                if ($_SESSION['rol']=='4') {
                  echo $this->Tipo3 ."". $this->Label ."". $this->Tipo2 ."". $this->Tipo4;
                  }
                }
              }
            }
        }else{
          //header('Location: ../index.php');
        }
echo <<< HTML
  </p><br>
</form>
HTML;

  }

}


?>
