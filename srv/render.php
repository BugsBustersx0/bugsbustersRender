<?php


try {

 $lista = [
  [
   "nombre" => "Torres Almazán Luis Fernando",
   "chiste" => "¿Por qué los programadores confunden Halloween y Navidad? Porque OCT 31 == DEC 25."
  ],
[
 "nombre" => "Jiménez Mercado Agustín",
 "chiste" => "¿Cómo se llama un programador que sale a la calle? Un 'fuera de contexto'."
  ],
[
 "nombre" => "Carrillo Santigo Leonardo",
 "chiste" => "¿Por qué el código fue al médico? Porque tenía demasiados bugs."
  ],
  [
   "nombre" => "De La Cruz Gonzales Miguel Ángel",
   "chiste" => "¿Cuál es el café favorito de los programadores? El Java."
  ],
[
  "nombre" => "Valencia Miguel Marco Antonio",
  "chiste" => "¿Por qué los programadores prefieren el té? Porque es más fácil de depurar."
  ]
 ];

 // Genera el código HTML de la lista.
 $render = "";
 foreach ($lista as $modelo) {
  /* Codifica nombre y chiste para que cambie los caracteres
   * especiales y el texto no se pueda interpretar como HTML.
   * Esta técnica evita la inyección de código. */
  $nombre = htmlentities($modelo["nombre"]);
  $chiste = htmlentities($modelo["chiste"]);
  $render .=
   "<dt>{$nombre}</dt>
    <dd>{$chiste}</dd>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {

 devuelveErrorInterno($error);
}

// Definición de funciones auxiliares para evitar error 500
function devuelveJson($data) {
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function devuelveErrorInterno($error) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode([
        'error' => 'Error interno del servidor',
        'mensaje' => $error->getMessage()
    ]);
    exit;
}
