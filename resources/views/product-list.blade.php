<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="container" style="margin-top: 20px; text-align:center;" >
        <div class="row">
            <div class="col-md-12">
                <h2>Product Listing Application</h2>
            </div>

            @auth
                <a href="{{url('login')}}" style="font-weight: bold;" class="p-2 nav-link">{{auth()->user()->name}}</a>
            @endauth



            <form action="{{url('logout')}}" method="get">
                <button type="submit" class="btn btn-primary rounded-pill">Logout</button>
            </form>
           

            @guest
                <div>
                    <a href="{{url('login')}}" class="btn btn-primary rounded-pill">Login</a>
                    <a href="{{url('register')}}" class="btn btn-secondary rounded-pill">Register</a>
                </div>
            @endguest

           
            <div style="margin-bottom:20px;">
                <a href="{{url('add-product')}}" class="btn btn-outline-primary rounded-pill;" style="margin-top: 15px;">Add Product</a>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            
            <table class="table" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($data as $products)
                    <tr>
                        <td class="pt-4">{{$i++}}</td>
                        <td class="pt-4">{{$products->prodname}}</td>
                        <td class="pt-4">{{$products->prodprice}}</td>
                        <td class="pt-4">{{$products->proddesp}}</td>
                        <td><img src="images/{{$products->prodimage}}" style="width:100px; height:100px;" alt=""></td>
                        <td class="pt-4"><a href="{{url('edit-product/'.$products->id)}}" class="btn btn-primary rounded-pill">Edit</a> <a href="{{url('delete-product/'.$products->id)}}" class="btn btn-danger rounded-pill">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>