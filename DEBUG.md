# Debug

## Introducción

En este archivo se disponen cada uno de los bugs que presenta el sistema, para recordar así cada una de las cosas que deben ser modificadas.


### Listado


* Cuando un user quiere ver sus gauchadas y postulaciones, se rompe si alguna de las postulaciones corresponde a una gauchada eliminada (ver una vez arreglado el bug anterior).


* Postulants_aux

* Editar Categorias

* Agregar imagenes a una gauchada, problemas con tabla nexo

* No se debe ver el boton de postulate si sos admin (Gauchada View)

    * Si hay alguien postulado me dice que me postule, revisar condicionales.

* Una vez postulado, voy al view de la gauchada y me aparece esto "Fuiste rechazado... Pero no te desmotives aquí hay más gauchadas", aún cuando no me han rechazado.

    * Sin embargo, me deja ponerle el poncho y el resto anda bien... Debe ser algún if mal puesto en el template view.
