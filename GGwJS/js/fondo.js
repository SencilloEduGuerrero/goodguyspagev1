fondo1 = 0;

function cambioFondo()
{
    if (fondo1 == 0)
    {
        fondo1 = "url('img/BackgroundScript.png')";
        document.body.style.backgroundImage = fondo1;

        fondo1++;
    }
    else
    {
        fondo2 = "url('img/BackgroundAlt.png')";
        document.body.style.backgroundImage = fondo2;

        fondo1 = 0;
    }
}