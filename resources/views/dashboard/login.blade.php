
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
   
  <title>login my todo's</title>
</head>
<body>
  
</body>
</html>
    
<section class="ftco-section">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url(https://i.pinimg.com/736x/b6/63/ed/b663ed00c8679fbfaf25e44d321bfc8c.jpg);">
              </div>
                    <div class="login-wrap p-4 p-md-5">
                  <div class="d-flex">
                      <div class="w-100">
                          <h3 class="mb-4">Welcome to TODO-APP</h3>
                      </div>
                            
                  </div>
                        <form action="/login" method="POST" class="signin-form">
                            @csrf 
                      <div class="form-group mb-3">
                          <label class="label" for="name">Username</label>
                          <input type="text" class="form-control" placeholder="Username" name="username" required>
                      </div>
                <div class="form-group mb-3">
                    <label class="label" for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                </div>
              
              </form>
              <p class="text-center">Dont have account? <a data-toggle="tab" href="/register">click</a></p>
            </div>
          </div>
            </div>
        </div>
    </div>
</section>

  

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      <script src="{{ url('assets/js/script.js') }}"></script>
</body>
</html>
