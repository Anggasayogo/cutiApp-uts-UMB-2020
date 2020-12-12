<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Cuti App</title>
  </head>
  <body>
    <div class="container">
     <div class="row">
        <div class="col-md-4"></div>
            <div class="col-md-4 shadow p-3 mb-5 bg-white rounded" style="margin-top: 250px;">
            <h3 class="text-center">Login</h3>
            <form method="post" action="../controller/authcontroller.php">
                <div class="form-group">
                    <label>Input Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Input Email"/>
                </div>
                <div class="form-group mt-3">
                    <label>Input Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Input Password"/>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3 form-control">Login Sekarang!</button>
            </form>
            </div>
        <div class="col-md-4"></div>
     </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>