const formulario = document.getElementById('registro');
const inputs = document.querySelectorAll('#registro input');

//Expresiones regulares
const expresiones =
{
    nombre: /^[a-zA-Z0-9\_\-]{3,20}$/,
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    contraseña: /^.{4,20}$/
};

const campos = {
	nombre: false,
	email: false,
	contraseña: false,
}

const validarFormulario = (e) =>
{
    switch (e.target.name)
    {
        case "nombre":
            if (expresiones.nombre.test(e.target.value))
            {
                document.getElementById('id_nombre').classList.remove('campo--error');
                document.getElementById('id_nombre').classList.add('campo--correcto');
                document.querySelector('#id_nombre i').classList.add('fa-check-circle');
                document.querySelector('#id_nombre i').classList.remove('fa-times-circle');
                document.querySelector('#id_nombre .campo--error').classList.remove('campo--error');
                campos["nombre"] = true;
            }
            else
            {
                document.getElementById('id_nombre').classList.add('campo--error');
                document.getElementById('id_nombre').classList.remove('campo--correcto');
                document.querySelector('#id_nombre i').classList.remove('fa-check-circle');
                document.querySelector('#id_nombre i').classList.add('fa-times-circle');
                document.querySelector('#id_nombre .campo--error').classList.add('campo--error');
                campos["nombre"] = false;
            }
        break;
        case "email":
            if (expresiones.email.test(e.target.value))
            {
                document.getElementById('id_email').classList.remove('campo--error');
                document.getElementById('id_email').classList.add('campo--correcto');
                campos["email"] = true;
            }
            else
            {
                document.getElementById('id_email').classList.add('campo--error');
                document.getElementById('id_email').classList.remove('campo--correcto');
                campos["email"] = false;
            }
        break;
        case "contraseña":
            if (expresiones.contraseña.test(e.target.value))
            {
                document.getElementById('id_contraseña').classList.remove('campo--error');
                document.getElementById('id_contraseña').classList.add('campo--correcto');
                campos["contraseña"] = true;
            }
            else
            {
                document.getElementById('id_contraseña').classList.add('campo--error');
                document.getElementById('id_contraseña').classList.remove('campo--correcto');
                campos["contraseña"] = false;
            }
        break;
    }
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) =>
{
	e.preventDefault();
});