@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Product</h1>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

           <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="custom-select" name="categories_id">
                                    <option selected>Choose category</option>
                                    @foreach ($categories as $category)
                                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="desc" rows="10" class="d-block w-100 form-control">{{ old('desc') }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" name="stock" placeholder="Stock"
                                    value="{{ old('stock') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="custom-select" name="gender">
                                    <option selected>Choose gender</option>
                                     <option value="men">Men</option>
                                     <option value="women">Women</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                               <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Price"
                                    value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                               <label for="donation">Donation</label>
                                <input type="text" class="form-control" name="donation" placeholder="Donation"
                                    value="{{ old('donation') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="type_sizes_id">Type Size</label>
                                <select class="custom-select" name="type_sizes_id">
                                    <option selected>Choose Type Size</option>
                                    @foreach ($type_sizes as $type_size)
                                     <option value="{{ $type_size->id }}">{{ $type_size->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row" id="extra-size">
                       <div class="col-2">
                            <div class="form-group">
                               <label for="size">Size</label>
                                <input type="button" class="btn btn-outline-dark ml-3" id="add" value="add" />
                                <input type="number" class="form-control" name="size[]"
                                    value="">
                            </div>
                        </div>
                       
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <script>
      window.addEventListener("load", function() {
        document.getElementById("add").addEventListener("click", function() {

      
            // Create a div
            var div = document.createElement("div");
            div.setAttribute("class", "col-2");
            
            var div2 = document.createElement("div");
            div.setAttribute("class", "form-group mr-3");
            div.setAttribute("style", "margin-top:38px;");

            // Create a text input
            var input = document.createElement("input");
            input.setAttribute("type", "number");
            input.setAttribute("class", "form-control"); // you may want to change this
            input.setAttribute("name", "size[]"); // you may want to change this

            // add the file and text to the div
            div.appendChild(div2);
            div.appendChild(input);

            //Append the div to the container div
            document.getElementById("extra-size").appendChild(div);
        });
        });
    </script>

@endsection
