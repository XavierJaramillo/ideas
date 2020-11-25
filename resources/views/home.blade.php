<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Ideas</title>
</head>
<body>
    

    <div class="container px-lg-5 pt-5">
        <h3>Nota</h3>
        <div class="row mx-lg-n5">
          <div class="col py-3 px-lg-5 border bg-light">
            <form action="/action_page.php">
                <div class="form-group">
                    <label for="title">Título</label><br>
                    <input class="form-control" type="text" id="title" name="title" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label><br>
                    <input class="form-control" type="text" id="description" name="description" placeholder="Crear nota...">
                </div>
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Crear">
                </div>
            </form>
          </div>
          <div class="col py-3 px-lg-5 border bg-light">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
              
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
          </div>
        </div>
    </div>
    
</body>
</html>