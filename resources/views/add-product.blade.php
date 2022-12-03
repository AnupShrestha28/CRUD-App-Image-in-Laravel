<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    @vite(['resources/js/app.js'])
</head>
<body>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-bold">Add Product</h2>
            </div>

            <form action="{{url('save-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Product Name" value="{{old('name')}}">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Enter Product Price" value="{{old('price')}}">
                    @error('price')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Description</label>
                    <textarea name="description" class="form-control" placeholder="Enter Product description">{{old('description')}}</textarea>
                    @error('description')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" name="image" class="form-control" value="{{old('image')}}">
                    @error('image')
                        <div class="alert alert-danger" role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <br>

                <button type="submit" class="btn btn-outline-primary rounded-pill">Save Product</button>
            </form>
        </div>
    </div>
    
</body>
</html>