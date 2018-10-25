


$(".jsDeleteButton").click(function ()
{
    console.log("Clique d'un jsDeleteButton");

    var id = $(this).attr('id'); /* Création d'une variable id de this, car this.id non utilisable dans le callback */

    return confirm("Êtes vous sur de vouloir supprimer ceci ? \n" + $("#maintd" + id).text())

    //event.preventDefault(); /* Annule le Submit, pour éviter une suppréssion, au cas ou l'utilisateur appuis sur annulé */

});