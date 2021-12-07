@extends('layouts.admin')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
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
                <form action="{{ route('product.update', $item->id) }}" method="post">
                    @method('PUT')
                    @csrf
                         <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                    value="{{ $item->name }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="custom-select" name="categories_id">
                                    <option selected>Choose category</option>
                                    @foreach ($categories as $category)
                                        <option 
                                            value="{{ $category->id }}" 
                                            {{ ($item->categories->id == $category->id) ? 'selected' : ''}}
                                        >{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea name="desc" rows="10" class="d-block w-100 form-control">{{ $item->desc }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" name="stock" placeholder="Stock"
                                    value="{{ $item->stock }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="custom-select" name="gender">
                                    <option selected>Choose gender</option>
                                     <option value="men" {{ $item->gender == 'men' ? 'selected' : '' }}>Men</option>
                                     <option value="women" {{ $item->gender == 'women' ? 'selected' : '' }}>Women</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                               <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Price"
                                    value="{{ $item->price }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                               <label for="donation">Donation</label>
                                <input type="text" class="form-control" name="donation" placeholder="Donation"
                                    value="{{ $item->donation }}">
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
                                        <option 
                                            value="{{ $type_size->id }}" 
                                            {{ ($item->type_sizes_id == $type_size->id) ? 'selected' : '' }}>
                                            {{ $type_size->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">

                        <div class="form-group">
                                <label for="status">Status</label>
                                <select class="custom-select" name="status">
                                    <option selected>Choose Status</option>
                                        <option 
                                            value="1" 
                                            {{ $item->status == 1 ? 'selected' : '' }}>
                                            Live
                                        </option>
                                        <option 
                                            value="0" 
                                            {{ $item->status == 0 ? 'selected' : '' }}>
                                            Archive
                                        </option>
                                </select>
                        </div>
                        </div>
                    </div>
                    <div class="row" id="extra-size">
                    @foreach ($item->sizes->sortBy('size') as $size)
                       
                       <div class="col-2">
                            <div class="form-group">
                               @if($loop->iteration == 1)
                               <label for="size">Size</label>
                                <input type="button" class="btn btn-outline-dark ml-3" id="add" value="add" />
                                <input type="number" class="form-control" name="size[]"
                                    value="{{ $size->size }}">

                                        <a type="button" href="/admin/size/delete/{{ $size->id }}/{{ $item->id }}" class="form-control btn btn-danger">
                                            delete
                                        </a>
                                    

                               @endif
                               @if($loop->iteration > 1)
                                <input type="number" class="form-control" name="size[]"
                                    value="{{ $size->size }}" style="margin-top:38px;">
                                    
                                    <a type="button" href="/admin/size/delete/{{ $size->id }}/{{ $item->id }}" class="form-control btn btn-danger">
                                        delete
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                       
                    
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
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