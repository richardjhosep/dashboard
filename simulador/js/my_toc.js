var idioma = "es";

function translate_error(error) {
    var mensaje = "";
    switch (error) {
        case '400':
            mensaje =  "Request mal formado"
        break;
        case '401':
            mensaje =  "Servicio no habilitado"
        break;
        case '402':
            mensaje =  "El límite de transacciones o tiempo de prueba del cliente fue superado."
        break;
        case '405':
            mensaje =  "Session-id inválido."
        break;
        case '411':
            mensaje = "Parámetro apiKey no encontrado"
        break;
        case '421':
            mensaje = "apiKey no existe"
        break;
        case '422':
            mensaje = "mode no existe"
        break;
        case '423':
            mensaje = "Valor incorrecto de autocapture o liveness"
        break;
        case '430':
            mensaje = "No se pudo validar el documento"
        break;
        case '500':
            mensaje = "Error interno, contactar a soporte"
        break;
        default:
            mensaje = error;
        break;
    }

    alert("ERROR: " + mensaje);
}

