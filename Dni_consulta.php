<?php
$dni = $_POST["dni"];

if (strlen($dni) !== 8) {
    $response = json_encode(["error" => "El DNI debe tener exactamente 8 dígitos"]);
} else {

    $url = 'https://api.perudevs.com/api/v1/dni/complete?document=' . $dni . '&key=cGVydWRldnMucHJvZHVjdGlvbi5maXRjb2RlcnMuNjUyMDk5ZWRiMzEyMDcwMDhlODA5MmQy';


    $data = @file_get_contents($url);

    $json_data = json_decode($data);

    if ($json_data === NULL) {
        $response = json_encode(["error" => "La respuesta de la API no es válida"]);
    } else {
        if ($json_data->estado && $json_data->mensaje === "Encontrado") {

            $response = json_encode([
                "nombres" => $json_data->resultado->nombres,
                "apellidop" => $json_data->resultado->apellido_paterno,
                "apellidom" => $json_data->resultado->apellido_materno,
                "sexo" => $json_data->resultado->genero,
                "fechaNacimiento" => $json_data->resultado->fecha_nacimiento,
                "codigoVerificacion" => $json_data->resultado->codigo_verificacion
            ]);
        } else {
            $response = json_encode(["error" => "No se encontraron datos para este DNI"]);
        }
    }
}


echo $response;
