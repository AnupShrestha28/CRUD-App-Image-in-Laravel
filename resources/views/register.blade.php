<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Welcome to Register Page</h2>
            </div>

            <form action="{{url('user-login')}}" method="post">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="name" name="name" class="form-control" placeholder="Enter name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password">
                </div>

                <p>Already have an account ? <a href="{{url('login')}}">Login Now</a></p>

                <button type="submit" class="btn btn-outline-primary rounded-pill">Register</button>
            </form>
        </div>
    </div>
</body>
</html>