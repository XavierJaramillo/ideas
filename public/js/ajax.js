window.onload = function() {
    mostrar();
    num = 0;
}

function mostrarModal(id) {
    var modal = document.getElementById("#myModal" + id);
    var myInput = document.getElementById('myInput');
    modal.on('shown.bs.modal', function() {
        myInput.trigger('focus')
    })
}

function objetoAjax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

/* Muestra todos los registros de la base de datos (sin filtrar y filtrados) */
function mostrar() {
    var section = document.getElementById('body');
    var buscador = document.getElementById('buscador').value;
    var token = document.getElementById('token').getAttribute('content');
    var ajax = new objetoAjax();
    ajax.open('post', 'mostrar', true);
    var datasend = new FormData();
    datasend.append('filtro', buscador);
    datasend.append('_token', token);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            var respuesta = JSON.parse(ajax.responseText);
            var tabla = '';
            for (let i = 0; i < respuesta.length; i++) {
                tabla += '<tr>';
                tabla += '<td>' + respuesta[i].id + '</td>';
                tabla += '<td>' + respuesta[i].title + '</td>';
                tabla += '<td>' + respuesta[i].description + '</td>';
                tabla += '<td>';
                tabla += '<button type="button" onclick="openModal(' + respuesta[i].id + ')" class="btn btn-info" data-toggle="modal" data-target="#myModal' + respuesta[i].id + '">Actualizar</button>';
                tabla += '<div id="modal' + respuesta[i].id + '" class="modal">';
                tabla += '<div class="modal-content">';

                tabla += '<table class="table">';
                tabla += '<thead class="thead-dark">';
                tabla += '<tr>';
                tabla += '<th scope="col">ID</th>';
                tabla += '<th scope="col">Titulo</th>';
                tabla += '<th scope="col">Descripción</th>';
                tabla += '</tr>';
                tabla += '</thead>';
                tabla += '<tbody>';
                tabla += '<td>';
                tabla += '<div class="form-group">';
                tabla += '<input type="text" class="form-control" id="updateId' + respuesta[i].id + '" value="' + respuesta[i].id + '" readonly>';
                tabla += '</div>';
                tabla += '</td>';
                tabla += '<td>';
                tabla += '<div class="form-group">';
                tabla += '<input type="text" class="form-control" id="updateTitle' + respuesta[i].id + '" value="' + respuesta[i].title + '" required>';
                tabla += '</div>';
                tabla += '</td>';
                tabla += '<td>';
                tabla += '<div class="form-group">';
                tabla += '<textarea class="form-control" id="updateDesc' + respuesta[i].id + '" required>' + respuesta[i].description + '</textarea>';
                tabla += '</div>';
                tabla += '</td>';
                tabla += '</tbody>';
                tabla += '</table>';
                tabla += '<div class="d-flex justify-content-center p-2">';
                tabla += '<button type="button" onclick="editarNota(' + respuesta[i].id + ')" class="btn btn-success mx-1" data-target="#myModal' + respuesta[i].id + '">Aceptar</button>';
                tabla += '<button type="button" onclick="closeModal(' + respuesta[i].id + ')" class="btn btn-danger mx-1" data-target="#myModal' + respuesta[i].id + '">Cerrar</button>';
                tabla += '</div>';
                tabla += '</div>';
                tabla += '</div>';
                tabla += '</td>';
                tabla += '<td>';
                tabla += "<button class='btn btn btn-danger' type='submit' onclick='borrarNota(" + respuesta[i].id + ")'>Borrar</button>";
                tabla += '</td>';
                tabla += '</tr>';
            }
            section.innerHTML = tabla;
        }
    }
    ajax.send(datasend);

}

function crearNota() {
    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;
    var token = document.getElementById('token').getAttribute('content');
    var msg = document.getElementById('cambios');

    var ajax = new objetoAjax();
    ajax.open('POST', 'crear', true);

    var datasend = new FormData();
    datasend.append('title', title);
    datasend.append('description', description);
    datasend.append('_token', token);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            msg.innerHTML = "Nota añadida correctamente!";
            mostrar();
        } else {
            msg.innerHTML = "Algo ha fallado!";
        }
    }

    ajax.send(datasend);
}

function editarNota(id) {
    var title = document.getElementById('updateTitle' + id).value;
    var description = document.getElementById('updateDesc' + id).value;
    var token = document.getElementById('token').getAttribute('content');
    var msg = document.getElementById('cambios');

    var ajax = new objetoAjax();
    ajax.open('POST', 'modificar', true);

    var datasend = new FormData();
    datasend.append('id', id);
    datasend.append('title', title);
    datasend.append('description', description);
    datasend.append('_token', token);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            msg.innerHTML = "Nota modificada correctamente!";
            mostrar();
            closeModal(id);
        } else {
            msg.innerHTML = "Algo ha fallado!";
        }
    }

    ajax.send(datasend);
}

function borrarNota(num) {
    var token = document.getElementById('token').getAttribute('content');
    var msg = document.getElementById('cambios');

    var ajax = new objetoAjax();
    ajax.open('post', 'borrar', true);

    var datasend = new FormData();
    datasend.append('_token', token);
    datasend.append('num', num);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200) {
            msg.innerHTML = "Nota borrada correctamente!";
            mostrar();
        } else {
            msg.innerHTML = "Algo ha fallado!";
        }
    }
    ajax.send(datasend);
}

/* Abre el modal al dar click a la img */
function openModal(num) {
    this.num = num;
    var modal = document.getElementById("modal" + num);
    modal.style.display = "block";
}

/* Cierra el modal si le das click a la x */
function closeModal(num) {
    var modal = document.getElementById("modal" + num);
    modal.style.display = "none";
}

/* Cierra el modal al clickar en cualquier otro sitio que no sea el modal */
window.onclick = function(event) {
    var modal = document.getElementById("modal" + num);
    if (event.target == modal) {
        modal.style.display = "none";
    }
}