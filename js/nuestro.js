
/*Función AJAX que busca ficheros.*/

function objetoAjax () { 
     var obj; //variable que recogerá el objeto
         if (window.XMLHttpRequest) { //código para mayoría de navegadores
            obj=new XMLHttpRequest();
         }
         else { //para IE 5 y IE 6
            obj=new ActiveXObject(Microsoft.XMLHTTP);
        }
        return obj; //devolvemos objeto
}

function MostrarConsultaNombre(){
    var divResultado = document.getElementById('ficheros');
    var busqueda = document.getElementById('busqueda').value;
    
    var ajax=objetoAjax();
    ajax.open("GET", "scriptBusquedaFicheros.php?busqueda="+busqueda);
    ajax.onreadystatechange=function() {
        if (ajax.readyState==4) {
            divResultado.innerHTML = ajax.responseText;
        }
    }
    ajax.send(null);
}

$('#modificar').on('click',function(){
        BootstrapDialog.show({
            title: 'Modificar Cuenta',
            message: $('<div></div>').load('modificarCuenta.php')
        });
});
