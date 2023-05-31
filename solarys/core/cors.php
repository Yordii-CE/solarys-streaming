<?php
class Cors
{
    static function enableCors()
    {
        // Permitir solicitudes desde cualquier origen
        header("Access-Control-Allow-Origin: *");

        // Permitir los métodos HTTP que deseas permitir (GET, POST, OPTIONS, etc.)
        header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");

        // Permitir los encabezados personalizados que deseas permitir
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        // Indicar si los encabezados y credenciales pueden ser expuestos en la respuesta
        header("Access-Control-Expose-Headers: Content-Length, X-JSON");

        // Establecer la duración máxima de la solicitud preflight (opcional)
        header("Access-Control-Max-Age: 86400");

        // Permitir el envío de cookies a través de solicitudes CORS (opcional)
        header("Access-Control-Allow-Credentials: true");
    }
}
