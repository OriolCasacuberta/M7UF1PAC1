function mostrarPopup()
{
    var username = prompt("Por favor, introduce tu nombre de usuario o correo electrónico:");
    if (username !== null && username !== "")
    {
        // Realizar una solicitud AJAX para verificar si el usuario está en la base de datos
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'verificar_usuario.php?username=' + username, true);
        xhr.onreadystatechange = function()
        {
            if (xhr.readyState === 4 && xhr.status === 200)
            {
                var respuesta = xhr.responseText;
                if (respuesta === 'existe')
                {
                    var confirmation = confirm("¿Estás seguro de que deseas enviar un correo electrónico de restablecimiento de contraseña a: " + username + "?");
                    if (confirmation) enviarEmail(username);
                }

                else alert("El usuario " + username + " no existe en nuestra base de datos.");
            }
        };
        xhr.send();
    }
}

function enviarEmail(username)
{
    alert("Se ha enviado un correo electrónico de restablecimiento de contraseña a: " + username);

    var apiKey = 'tu_api_key_de_sendgrid';
    var url = 'https://api.sendgrid.com/v3/mail/send';

    var data = {
        personalizations: [{
            to: [{ email: username }],
            subject: 'Restablecimiento de contraseña'
        }],

        // TODO Cambiar Mail
        from: { email: 'tu_direccion_de_correo@example.com' },
        content: [{
            type: 'text/plain',
            value: 'Hola ' + username + ',\n\n' +
                    'Has solicitado restablecer tu contraseña. Por favor, sigue las instrucciones proporcionadas en el correo electrónico.\n\n' +
                    'Saludos, Equipo de Soporte'
        }]
    };

    var xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Authorization', 'Bearer ' + apiKey);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function()
    {
        if (xhr.readyState === 4)
        {
            if (xhr.status === 202) alert('El correo electrónico se ha enviado correctamente a: ' + username);
            else alert('Hubo un problema al enviar el correo electrónico.');
        }
    };

    xhr.send(JSON.stringify(data));
}