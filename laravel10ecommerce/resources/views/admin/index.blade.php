@extends('layouts.admin')

@section('contents')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Admin Dashboard</h3>
                <nav>
                    <ol class="breadcrumb">
                        
                        <li class="breadcrumb-item active" aria-current="page">Hello Admin</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
    <!-- user dashboard section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs custome-nav-tabs flex-column category-option" id="myTab">
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light active" id="tab" data-bs-toggle="tab" data-bs-target="#dash" type="button"><i class="fas fa-angle-right"></i>Dashboard</button>
                        </li>
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="1-tab" data-bs-toggle="tab" data-bs-target="#order" type="button"><i class="fas fa-angle-right"></i>Product <b>{{$productsCount}}</b></button>
                        </li>
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="2-tab" data-bs-toggle="tab" data-bs-target="#wishlist" type="button"><i class="fas fa-angle-right"></i>Categories <b>{{$categories->count()}}</b></button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link font-light" id="6-tab" data-bs-toggle="tab" data-bs-target="#security" type="button"><i class="fas fa-angle-right"></i>Brands <b>{{$brands->count()}}</b></button>
                        </li>
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="4-tab" data-bs-toggle="tab" data-bs-target="#pay" type="button"><i class="fas fa-angle-right"></i>Orders</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="3-tab" data-bs-toggle="tab" data-bs-target="#save" type="button"><i class="fas fa-angle-right"></i>Accounts <b>{{$u_users->count()}}</b></button>
                        </li>
                        
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="filter-button dash-filter dashboard">
                        <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dash">
                            <div class="dashboard-right">


                                {{-- dashboard --}}
                                <div class="dashboard">
                                    <div class="page-title title title1 title-effect">
                                        <h2>My Dashboard</h2>
                                    </div>
                                    @foreach ($users as $user)
                                        <div class="welcome-msg">
                                            <h6 class="font-light">Hello, <span>{{$user->name}} !</span></h6>
                                            <p class="font-light">From your My Account Dashboard you have the ability to
                                                view a snapshot of your recent account activity and update your account
                                                information. Select a link below to view or edit information.</p>
                                        </div>
                                    

                                    <div class="order-box-contain my-4">
                                        <div class="row g-4">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/account.svg" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/account1.svg" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">total User</h5>
                                                            <h3>{{$user->count()}} </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/sent.png" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/sent1.png" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">Orders</h5>
                                                            <h3>215</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/wishlist.png" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/wishlist1.png" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">Products</h5>
                                                            <h3>{{$products->count()}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                            </div>
                        </div>

                        {{-- products --}}
                        <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="order">
                            <div class="box-head mb-3 d-flex justify-content-between align-items-center">
                                <h3>Products</h3>
                                <div class="d-flex align-items-end">
                                    <div class="input-group search-bar me-3">
                                        <form action="{{ route('products.search') }}" method="GET" class="d-flex">
                                            <input type="text" name="search" class="form-control search-input" placeholder="Search products" value="{{ request()->query('search') }}">
                                            <button type="submit" class="btn btn-solid-default btn-sm fw-bold my-2 input-group-text search-button">
                                                <i class="fas fa-search text-color"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <button class="btn btn-solid-default btn-sm fw-bold my-2" data-bs-toggle="modal" data-bs-target="#staticBackdropProduct">
                                        <i class="fas fa-plus"></i> Add New Product
                                    </button>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table cart-table">
                                    <thead>
                                        <tr class="table-head">
                                            <th scope="col">image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product-list">
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <a href="details.php">
                                                        <img src="/products/{{$product->image}}" class="blur-up lazyload" alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <p class="mt-0">{{$product->name}}</p>
                                                </td>
                                                <td>
                                                    <p class="fs-6 m-0">{{$product->quantity}}</p>
                                                </td>
                                                <td>
                                                    <p class="success-button btn btn-sm">${{$product->regular_price}}</p>
                                                </td>
                                                <td class="d-flex justify-content-between">
                                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{$product->id}}" class="btn btn-solid-default btn-sm fw-bold" href="" title="View">
                                                        View
                                                    </a>
                                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdropedit{{$product->id}}" class="btn btn-solid-default btn-sm fw-bold" href="javascript:void(0)" title="Edit">
                                                        Edit
                                                    </a>
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-solid-default btn-sm fw-bold">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                            {{-- modal view --}}
                                            <div class="modal fade" id="staticBackdrop1{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h1 class="modal-title fs-5 bw-bold text-white m-3" id="exampleModalLabel"><b>{{$product->name}}</b></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <img style="height: 100%; width: 100%;" src="/products/{{$product->image}}" class="img-fluid" alt="{{$product->name}}">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item"><strong>Name:</strong> {{$product->name}}</li>
                                                                        <li class="list-group-item"><strong>Brand:</strong> {{$product->brand->name}}</li>
                                                                        <li class="list-group-item"><strong>Category:</strong> {{$product->category->name}}</li>
                                                                        <li class="list-group-item"><strong>SKU:</strong> {{$product->SKU}}</li>
                                                                        <li class="list-group-item"><strong>Price:</strong> ${{$product->regular_price}}</li>
                                                                        @if($product->sale_price)
                                                                            <li class="list-group-item"><strong>Sale Price:</strong> ${{$product->sale_price}}</li>
                                                                        @endif
                                                                        <li class="list-group-item"><strong>Quantity:</strong> {{$product->quantity}}</li>
                                                                        <li class="list-group-item"><strong>Stock Status:</strong> {{$product->stock_status}}</li>
                                                                        <li class="list-group-item"><strong>Description:</strong> {{$product->description}}</li>
                                                                        <li class="list-group-item"><strong>Short Description:</strong> {{$product->short_description}}</li>
                                                                        @if($product->images)
                                                                            <li class="list-group-item"><strong>Additional Images:</strong>
                                                                                <div class="row mt-2">
                                                                                    @foreach(json_decode($product->images, true) ?? [] as $image)
                                                                                        <div class="col-md-4">
                                                                                            <img src="/products/{{$image}}" class="img-fluid" alt="{{$product->images}}">
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            {{-- modal edit --}}
                                            <div class="modal fade" id="staticBackdropedit{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title text-white m-3 fw-bold" id="exampleModalLabel">Edit Product</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="slug" class="form-label">Slug</label>
                                                                <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="short_description" class="form-label">Short Description</label>
                                                                <input type="text" class="form-control" id="short_description" name="short_description" value="{{ $product->short_description }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">Description</label>
                                                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="regular_price" class="form-label">Regular Price</label>
                                                                <input type="number" step="0.01" class="form-control" id="regular_price" name="regular_price" value="{{ $product->regular_price }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="sale_price" class="form-label">Sale Price</label>
                                                                <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price" value="{{ $product->sale_price }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="SKU" class="form-label">SKU</label>
                                                                <input type="text" class="form-control" id="SKU" name="SKU" value="{{ $product->SKU }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="stock_status" class="form-label">Stock Status</label>
                                                                <select class="form-select" id="stock_status" name="stock_status" required>
                                                                    <option value="instock" {{ $product->stock_status === 'instock' ? 'selected' : '' }}>In Stock</option>
                                                                    <option value="outofstock" {{ $product->stock_status === 'outofstock' ? 'selected' : '' }}>Out of Stock</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="featured" class="form-label">Featured</label>
                                                                <input type="checkbox" id="featured" name="featured" {{ $product->featured ? 'checked' : '' }}>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="quantity" class="form-label">Quantity</label>
                                                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="image" class="form-label">Image</label>
                                                                <input type="file" class="form-control" id="image" name="image" value="{{ $product->image }}">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="images" class="form-label">Additional Images</label>
                                                                <input type="file" class="form-control" id="images" name="images[]" value="{{ $product->images }}" multiple>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="category_id" class="form-label">Category</label>
                                                                <select class="form-select" id="category_id" name="category_id" required>
                                                                    @foreach($categories as $category)
                                                                        <option value="{{ $category->id }}" {{ $category->id === $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="brand_id" class="form-label">Brand</label>
                                                                <select class="form-select" id="brand_id" name="brand_id" required>
                                                                    @foreach($brands as $brand)
                                                                        <option value="{{ $brand->id }}" {{ $brand->id === $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                            </div>
                                                        </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3" id="pagination-links">
                                {{ $products->links("pagination.default") }}
                            </div>
                        </div>
                        

                        {{-- category --}}
                        <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="wishlist">
                            <div class="box-head mb-3">
                                <h3>Category</h3>
                                <button class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#staticBackdropCategory"><i class="fas fa-plus"></i>
                                    Add New Category
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table cart-table">
                                    <thead>
                                        <tr class="table-head">
                                            <th scope="col">image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>
                                                <a href="details.php">
                                                    <img src="/category/{{$category->image}}" class="blur-up lazyload" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <p class="m-0">{{$category->name}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$category->slug}}</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-solid-default btn-sm fw-bold " data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{$category->id}}">
                                                    Edit
                                                </button>
                                                
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-solid-default btn-sm fw-bold">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- modal edit --}}
                                            <div class="modal fade" id="staticBackdrop1{{$category->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{$category->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel{{$category->id}}">Edit Category</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{-- {{ route('categories.update', $category->id) }} --}}
                                                            <form action="{{ route('categories.update', $category->id) }} " method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label for="name{{$category->id}}" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="name{{$category->id}}" name="name" value="{{ $category->name }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="slug{{$category->id}}" class="form-label">Slug</label>
                                                                    <input type="text" class="form-control" id="slug{{$category->id}}" name="slug" value="{{ $category->slug }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="image{{$category->id}}" class="form-label">Image</label>
                                                                    <input type="file" class="form-control" id="image{{$category->id}}" name="image">
                                                                    @if($category->image)
                                                                        <img src="/category{{$category->image}}" alt="{{ $category->name }}" class="img-thumbnail mt-2" width="100">
                                                                    @endif
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- modal edit end--}}
                                       
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        {{-- users --}}
                        <div class="tab-pane fade dashboard" id="save">
                            <div class="box-head">
                                <h3>Users</h3>
                                <button class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#addAddress"><i class="fas fa-plus"></i>
                                    Add New User</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table cart-table">
                                    <thead>
                                        <tr class="table-head">
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($u_users as $user)
                                        <tr>
                                            
                                            <td>
                                                <p class="m-0">{{$user->name}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$user->email}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$user->phone_number}}</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-solid-default btn-sm fw-bold " data-bs-toggle="modal" data-bs-target="#staticBackdropview{{$user->id}}">
                                                    View
                                                </button>
                                                <button type="button" class="btn btn-solid-default btn-sm fw-bold " data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$user->id}}">
                                                    Edit
                                                </button>
                                                
                                                <form action="{{ route('categories.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-solid-default btn-sm fw-bold">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- modal view --}}
                                            <div class="modal fade" id="staticBackdropview{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropview{{$user->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropview{{$user->id}}">Edit Category</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{$user->name}}                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- modal edit end--}}
                                        {{-- modal view --}}
                                            <div class="modal fade" id="staticBackdropEdit{{$user->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEdit{{$user->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropEdit{{$user->id}}">Edit user</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.users.update') }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                            
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Name</label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                                                </div>
                                                            
                                                                <div class="mb-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                                                </div>
                                                            
                                                                <div class="mb-3">
                                                                    <label for="phone_number" class="form-label">Phone Number</label>
                                                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                                                                </div>
                                                            
                                                                <div class="mb-3">
                                                                    <label for="address" class="form-label">Address</label>
                                                                    <textarea class="form-control" id="address" name="address">{{ $user->address }}</textarea>
                                                                </div>
                                                            
                                                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                                            </form>
                                                                                                                      
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- modal edit end--}}
                                       
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>

                        {{-- brands --}}
                        <div class="tab-pane fade dashboard-security dashboard" id="security">
                            <div class="box-head">
                                <h3>Brands</h3>
                                <button class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal" data-bs-target="#addBrand"><i class="fas fa-plus"></i>
                                    Add New Brand
                                </button>
                            </div>
                            <div class="table-responsive">
                                <table class="table cart-table">
                                    <thead>
                                        <tr class="table-head">
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                        <tr>
                                            
                                            <td>
                                                <img style="width: 90px; height: 90px; " src="/brands/{{$brand->image}}" alt="{{$brand->name}}">
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$brand->name}}</p>
                                            </td>
                                          
                                            <td>
                                                <button type="button" class="btn btn-solid-default btn-sm fw-bold " data-bs-toggle="modal" data-bs-target="#staticBackdropview{{$brand->id}}">
                                                    View
                                                </button>
                                                <button type="button" class="btn btn-solid-default btn-sm fw-bold " data-bs-toggle="modal" data-bs-target="#staticBackdropEdit{{$brand->id}}">
                                                    Edit
                                                </button>
                                                
                                                <form action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-solid-default btn-sm fw-bold">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- modal view --}}
                                            <div class="modal fade" id="staticBackdropview{{$brand->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropview{{$brand->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropview{{$brand->id}}">Brand</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{$brand->name}}                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- modal edit end--}}
                                        {{-- modal view --}}
                                            <div class="modal fade" id="staticBackdropEdit{{$brand->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropEdit{{$brand->id}}" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropEdit{{$brand->id}}">Edit brand</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{$brand->name}}                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {{-- modal edit end--}}
                                       
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- orders --}}
                        <div class="tab-pane fade dashboard" id="pay">
                            <div class="box-head">
                                <h3>Orders</h3>
                            </div>
                        
                            <div class="card-details-section">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>User</th>
                                                    <th>Products</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Transaction Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>#{{ $order->id }}</td>
                                                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                                                        <td>
                                                            @foreach ($order->orderItems as $item)
                                                                {{ $item->product->name ?? 'N/A' }} ({{ $item->quantity }})<br>
                                                            @endforeach
                                                        </td>
                                                        <td>${{ $order->total }}</td>
                                                        <td>{{ $order->status }}</td>
                                                        <td>{{ $order->transaction->status ?? 'N/A' }}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editOrderModal{{ $order->id }}">Edit</a>
                                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                        
                                                    <!-- Edit Modal -->
                                                    <div class="modal fade" id="editOrderModal{{ $order->id }}" tabindex="-1" aria-labelledby="editOrderModalLabel{{ $order->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editOrderModalLabel{{ $order->id }}">Edit Order Status</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="mb-3">
                                                                            <label for="status{{ $order->id }}" class="form-label">Status</label>
                                                                            <select class="form-select" id="status{{ $order->id }}" name="status" required>
                                                                                <option value="ordered" @if($order->status == 'ordered') selected @endif>Ordered</option>
                                                                                <option value="delivered" @if($order->status == 'delivered') selected @endif>Delivered</option>
                                                                                <option value="canceled" @if($order->status == 'canceled') selected @endif>Canceled</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End Edit Modal -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- user dashboard section end -->


    {{-- add product form modal --}}
        <!-- Modal form product -->
        <!-- Modal Trigger -->


<!-- Modal -->
                <div class="modal fade" id="staticBackdropProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h1 class="modal-title m-3 text-white fs-5" id="staticBackdropLabel">Add New Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="short_description" class="form-label">Short Description</label>
                                        <input type="text" class="form-control" id="short_description" name="short_description" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="regular_price" class="form-label">Regular Price</label>
                                        <input type="number" step="0.01" class="form-control" id="regular_price" name="regular_price" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sale_price" class="form-label">Sale Price</label>
                                        <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price">
                                    </div>
                                    <div class="mb-3">
                                        <label for="SKU" class="form-label">SKU</label>
                                        <input type="text" class="form-control" id="SKU" name="SKU" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stock_status" class="form-label">Stock Status</label>
                                        <select class="form-select" id="stock_status" name="stock_status" required>
                                            <option value="instock">In Stock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="featured" class="form-label">Featured</label>
                                        <input type="checkbox" id="featured" name="featured">
                                    </div>
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="images" class="form-label">Additional Images</label>
                                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-select" id="category_id" name="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="brand_id" class="form-label">Brand</label>
                                        <select class="form-select" id="brand_id" name="brand_id" required>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        {{-- add product form modal end --}}
    {{-- add category form modal --}}
        <!-- Modal -->
                <div class="modal fade" id="staticBackdropCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h1 class="modal-title m-3 fs-5 text-white"  id="staticBackdropLabel">Add New Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        {{-- add category form modal end --}}

    {{-- add brand form modal --}}
        <!-- Modal -->
        <div class="modal fade" id="addBrand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h1 class="modal-title m-3 fs-5 text-white" id="staticBackdropLabel">Add New Brand</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('brands.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name ewdsd</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- add brand form modal end --}}



       
@endsection

