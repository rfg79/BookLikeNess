$("ul.stars .voto a").click(function(e)
{
    e.preventDefault(); /* Evitamos el # en la barra de direcciones */
    var voto=$(this).data("voto"); /* Obtenemos el resultado del voto: like o dislike */
    var puntaje=$(this).data("value"); /* Obtenemos el resultado del voto: 1 a 5 */
    var objeto=$(this).closest("li").find(".count"); /* Obtenemos el elemento para cambiar el valor una vez realizado el voto */
    if (voto && objeto && puntaje) votar(voto,puntaje,objeto); /* Votamos: en este tipo, el valor siempre será la estrella elegida */
});