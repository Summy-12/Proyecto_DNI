<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="stilo1.css">
  <script src="js/jquery.min.js"></script>
</head>

<body>

  <div id="container">
    <div class="cuadro1">
      <div id="busc">

        <div class="cuadrobuscador">
          <a class="text1">CONSULTAS RENIEC</a>

          <div class="input-container">

            <div class="input-bot">
              <input type="text" placeholder="Ingrese DNI :" id="dni" autocomplete="off" name="dni" oninput="soloNumeros(this)">

              <button id="prueba" style="margin-left: 3px;">CONSULTAR</button>

            </div>
          </div>
        </div>

      </div>

      <div class="cuadro2">

        <div id="profile-image">
          <img src="./img/perfil.jpg" alt="Imagen de perfil" width="100" height="100">
        </div>

        <div class="texto">
          <br><br>
          <div>Nombres: <label id="nombre"></label></div>
          <br>
          <div>Apellido Paterno.: <label id="apellidop"></label></div>
          <br>
          <div>Apellido Materno.: <label id="apellidom"></label></div>
          <br>
          <div>Sexo: <label id="sexo"></label></div>
          <br>
          <div>Fecha de Nacimiento: <label id="fechaNacimiento"></label></div>
          <br>

          <div>Codigo de verificacion: <label id="codigoVerificacion"></label></div>


        </div>

      </div>
    </div>
  </div>

  <script>
    function soloNumeros(input) {

      input.value = input.value.replace(/\D/g, '');
    }

    $("#prueba").click(function() {
      var dni = $("#dni").val();
      $.ajax({
        type: "POST",
        url: "Dni_consulta.php",
        data: 'dni=' + dni,
        dataType: 'json',
        success: function(data) {
          if (data == 1) {
            alert('El DNI tiene que tener 8 dígitos');
          } else {
            console.log(data);
            $("#nombre").html(data.nombres);
            $("#apellidop").html(data.apellidop);
            $("#apellidom").html(data.apellidom);
            $("#sexo").html(data.sexo);
            $("#fechaNacimiento").html(data.fechaNacimiento);
            $("#codigoVerificacion").html(data.codigoVerificacion);

          }
        }
      });
    });
  </script>
</body>

</html>