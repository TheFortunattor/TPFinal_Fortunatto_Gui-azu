articulos[0]["enduro"].forEach(function(dato, index) {
    let titulo = dato['Titulo'];
    let Cilindrada = dato["Cilindrada"];
    let Año = dato["Año"];
    let precio = dato["Precio"];
    let imagen = dato["img"][0];
    pintar("enduro",titulo,Cilindrada,Año,precio,imagen,"","","");
});

articulos[0]["naked"].forEach(function(dato, index) {
    let titulo = dato['Titulo'];
    let Cilindrada = dato["Cilindrada"];
    let Año = dato["Año"];
    let precio = dato["Precio"];
    let imagen = dato["img"][0];
    pintar("naked",titulo,Cilindrada,Año,precio,imagen);
});

articulos[0]["sport"].forEach(function(dato, index) {
    let titulo = dato['Titulo'];
    let Cilindrada = dato["Cilindrada"];
    let Año = dato["Año"];
    let precio = dato["Precio"];
    let imagen = dato["img"][0];
    pintar("sport",titulo,Cilindrada,Año,precio,imagen);
});

articulos[0]["custom"].forEach(function(dato, index) {
    let titulo = dato['Titulo'];
    let Cilindrada = dato["Cilindrada"];
    let Año = dato["Año"];
    let precio = dato["Precio"];
    let imagen = dato["img"][0];
    pintar("custom",titulo,Cilindrada,Año,precio,imagen);
});

function pintar(categoria,titulo,Cilindrada,Año,precio,imagen){
    var estructura = ' \
    <article class="articulo">\
                <div class="imagen">\
                    <img src="'+imagen+'" width="100%">\
                </div>\
                <div class="detalle">\
                    <h2>'+titulo+'</h2>\
                    <div>'+Cilindrada+' '+Año+'</div>\
                    <h3>'+precio+'</h3>\
                </div>\
            </article>\
    ';

    $("#"+categoria).append(estructura);    
}