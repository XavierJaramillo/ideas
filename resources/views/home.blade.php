<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Ideas</title>
</head>
<body>
    

    <div class="container px-lg-5 pt-5">
        <h3>Nota</h3>
        <div class="row mx-lg-n5">
          <div class="col py-3 px-lg-5 border bg-light">

              <div class="form-group">
                  <label for="title">Título</label><br>
                  <input class="form-control" type="text" id="title" name="title" placeholder="Título...">
              </div>
              <div class="form-group">
                  <label for="description">Descripción</label><br>
                  <input class="form-control" type="text" id="description" name="description" placeholder="Crear nota...">
              </div>
              <div class="form-group">
                  <input class="btn btn-success" type="submit" name="Crear" value="Crear" onclick="crearNota()">
              </div>
              <div class="form-group">
                <p id="cambios">Aquí verás los últimos cambios...</p>
              </div>

          </div>
          <div class="col py-3 px-lg-5 border bg-light">
            <div class="form-group">
            <label for="buscador">Filtro</label>
            <input class="form-control" type="text" id="buscador" placeholder="Filtro..." onkeyup="mostrar()">
            </div>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody id="body">
                  {{-- @foreach ($listaNotas as $nota)
                  <tr>
                  <td>{{$nota->id}}</td>
                  <td>{{$nota->title}}</td>
                  <td>{{$nota->description}}</td>
                  <td>
                  <!-- Trigger the modal with a button -->
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{{$nota->id}}">Actualizar</button>

                  <!-- Modal -->
                  <div id="myModal{{$nota->id}}" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-xl">
                  <!-- Modal content-->
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                  <table class="table">
                  <thead class="thead-dark">
                  <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Descripción</th>
                  </tr>
                  </thead>
                  <tbody>
                  <form action="{{url('/modificar/'.$nota->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                  <td>
                  <div class="form-group">
                  <label for="recipient-name" class="col-form-label">ID:</label>
                  <input type="text" class="form-control" id="recipient-name" value="{{$nota->id}}" readonly>
                  </div>
                  </td>
                  <td>
                  <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Titulo:</label>
                  <input type="text" class="form-control" name="title" id="recipient-name" value="{{$nota->title}}" required>
                  </div>
                  </td>
                  <td>
                  <div class="form-group">
                  <label for="message-text" class="col-form-label">Descripción:</label>
                  <textarea class="form-control" id="message-text" name="description" required>{{$nota->description}}</textarea>
                  </div>
                  </td>
                  </tbody>
                  </table>
                  <div class="form-group d-flex">
                  <input type="submit" name="Cancelar" value="Cancelar" class="btn btn-danger mr-auto" data-dismiss="modal">
                  <input type="submit" name="Enviar" value="Enviar" class="btn btn-success ml-auto">
                  </div>
                  </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </td>
                  <td>
                  <form method="POST" action="{{url('/borrar/'.$nota->id)}}">
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button class="btn btn btn-danger" type='submit' onclick="return confirm('¿Borrar?');">Borrar</button>
                  </form>
                  </td>
                  </tr>
                  @endforeach --}}
                </tbody>
              </table>
          </div>
        </div>
    </div>
    <script src="{{asset('js/ajax.js')}}"></script>
</body>
</html>