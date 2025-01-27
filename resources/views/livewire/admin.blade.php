<div class="wrapper">
    <aside id="sidebar">
        <div class="d-flex">
            <button class="toggle-btn" type="button">
                <i class="lni lni-grid-alt"></i>
            </button>
            <div class="sidebar-logo" id="navBarHomeBtn">
                <a href="#">Admin</a>
            </div>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="bi bi-person"></i>
                    <span>Product</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" id="viewProductBtn">View Product</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" id="addProductBtn">Add Product</a>
                    </li>
                </ul>
            </li>


            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="bi bi-bullseye"></i>
                    <span>Sub Category</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" id="viewSubCategoryBtn">View Sub Category</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" id="addSubCategoryBtn">Add Sub Category</a>
                    </li>

                </ul>
            </li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                    data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="lni lni-protection"></i>
                    <span>Orders</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" id="activeOrderLoadBtn">Active Orders</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" id="historyOrderBtn">Order History</a>
                    </li>
                    
                </ul>
            </li>


            <li class="sidebar-item">
                <a href="#" class="sidebar-link" id="changeDetails">
                    <i class="lni lni-cog"></i>
                    <span>Change admin details.
                    </span>
                </a>
            </li>

        </ul>
        <div class="sidebar-footer">
            <a href="#" class="sidebar-link" onclick="logOutAdmin()">
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
    <div class="main">
        <nav class="navbar navbar-expand px-4 py-3">
            <form action="#" class="d-none d-sm-inline-block">

            </form>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a href="./home" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                            <img src="../../resources/images/mgl_g5.svg" class="avatar " alt=""
                                id="accountImg" style="width:210px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end rounded">

                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="content px-3 py-4">
            <div class="container-fluid">
                <!-- main item goes here -->
                <div class="table-responsive d-none" id="profile">
                    <h1 class="text-center mb-2">User Details</h1>
                    <!-- users details start here -->
                    <table class="table mt-4">
                        <thead>
                            <tr>

                                <th scope="col">Email</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Postal Code</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Block</th>


                            </tr>
                        </thead>
                        <tbody id="userProfileTableBody">

                        </tbody>
                    </table>
                </div>
                <!-- user deatils end here -->
                <!-- admin Details start here -->
                <div id="adminDetailsContainer" class="d-none">
                    <h1 class="text-center">Admin Details</h1>
                    <h3>Add Admin</h3>
                    <div class="d-flex justify-content-between">
                        <div>
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="adminEmail">
                        </div>
                        <div>
                            <label for="">Passowrd</label>
                            <input type="text" class="form-control" id="adminPassowrd">
                        </div>
                        <div>
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" id="adminFullName">
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary text-center" id="adminSubmit">Add Admin</button>

                    </div>
                    <!-- users details start here -->
                    <div class="table-responsive" id="tableProfileBody">
                        <table class="table mt-4">
                            <thead>
                                <tr>

                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Delete</button></th>




                                </tr>
                            </thead>
                            <tbody id="adminBody">

                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- admin details end here -->



                <!-- package load start here -->
                <div class="packageLoadContainer d-none" id="viewProductContainer">
                    <h1 class="text-center mb-4">Your Products</h1>

                    <table class="table mt-4">
                        <thead>
                            <tr>

                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Sub Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Order Count</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody id="viewProductTableBody">

                            @foreach ($products as $product)
                                <tr id="product-{{ $product->id }}">
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->subCategory->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->orders }}</td>
                                    <td><button class="btn btn-danger"
                                            onclick="deleteProduct({{ $product->id }})">Delete</button></td>
                                </tr>
                            @endforeach




                        </tbody>
                    </table>






                </div>
                <!-- package load end here -->
                {{-- add product strat here --}}
                <!-- package load start here -->
                {{-- <div class="packageLoadContainer d-none" id="addProductContainer">
                    <h1 class="text-center mb-4">Add Products</h1>



                </div> --}}
                <div class="packageLoadContainer d-none" id="viewSubCategoryContainer">
                    <h1 class="text-center mb-4">View Sub Category</h1>

                    <table class="table mt-4">
                        <thead>
                            <tr>

                                <th scope="col">ID</th>
                                <th scope="col"> Sub Category</th>



                            </tr>
                        </thead>
                        <tbody id="viewProductTableBody">

                            @foreach ($subCategories as $item)
                                <tr id="product-{{ $product->id }}">
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category->name }}</td>

                                </tr>
                            @endforeach




                        </tbody>
                    </table>






                </div>
                <div class="packageLoadContainer d-none" id="addSubCategoryContainer">
                    <h1 class="text-center mb-4">Add Sub Category</h1>



                    <div class="mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Sub Category Name"
                                    id="subCategoryNameInput">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" id="categoryInput">
                                    <option selected>Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                  
                        <div class="text-center mt-4">
                            <button class="btn btn-primary" onclick="addSubCategory()">Add Sub Category</button>
                        </div>





                    </div>
                </div>
                    {{-- sub category --}}
                    <div class="packageLoadContainer d-none" id="addProductContainer">
                        <h1 class="text-center mb-4">Add Products</h1>

                        <div class="mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Product Name"
                                        id="prouctNameInput">
                                </div>

                                <div class="col-md-6  mt-md-0 mt-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Price"
                                            id="productPriceInput">



                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    {{-- stcock input --}}
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Stock"
                                            id="productStockInput">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <select class="form-select" id="productSubCategoryInput">
                                        <option selected>Sub Category</option>
                                        @foreach ($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                {{-- image --}}
                                <div class="col-md-6 mt-3">
                                    <input type="file" class="form-control" id="productImageInput">
                                </div>
                                {{-- description col-md-12 text area --}}
                                <div class="col-md-6 mt-3">
                                    <textarea class="form-control" placeholder="Description" rows="10" id="productDescriptionInput"></textarea>
                                </div>
                            </div>
                            <div class=" mt-5 text-center">
                                <button class="btn btn-primary" onclick="addProduct()">Add Product</button>

                            </div>
                        </div>








                    </div>
                    {{-- order --}}
                      <div class="packageLoadContainer d-none" id="activeOrdersContainer">
                    <h1 class="text-center mb-4">Active Products</h1>

                    <table class="table mt-4">
                        <thead>
                            <tr>

                                <th scope="col">Product Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">User Phone</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Action</th>
                            
                                
                            </tr>
                        </thead>
                        <tbody id="viewProductTableBody">
                            {{-- {{ $activeOrders }} --}}

                            @foreach ($activeOrders as $item)
                                <tr id="order-{{ $item->id }}">
                                    <td>{{ $item->order_line->product->name ?? 'N/A' }}</td>
                                    <td>{{ $item->user->first_name ?? 'N/A' }}</td>
                                    <td>{{ $item->user->email ?? 'N/A' }}</td>
                                    <td>{{ $item->user->phone ?? 'N/A' }}</td>
                                    <td>{{ $item->order_line->quantity ?? 'N/A' }}</td>
                                    <td>{{ $item->order_line->total_price ?? 'N/A' }}</td>
                                    <td><button class="btn btn-danger"
                                            onclick="Deliverd({{ $item->id }})">Diliverd</button></td>
                                 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>




                </div>
                 <div class="packageLoadContainer d-none" id="historyOrdersContainer">
                    <h1 class="text-center mb-4">History Order </h1>

                    <table class="table mt-4">
                        <thead>
                            <tr>

                                <th scope="col">Product Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">User Phone</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">Action</th>
                            
                                
                            </tr>
                        </thead>
                        <tbody id="viewProductTableBody">

                            @foreach ($historyOrders as $item)
                            <tr id="product-{{ $item->id }}">
                                <td>{{ $item->order_line->product->name ?? 'N/A' }}</td>
                                <td>{{ $item->user->first_name ?? 'N/A' }}</td>
                                <td>{{ $item->user->email ?? 'N/A' }}</td>
                                <td>{{ $item->user->phone ?? 'N/A' }}</td>
                                <td>{{ $item->order_line->quantity ?? 'N/A' }}</td>
                                <td>{{ $item->order_line->total_price ?? 'N/A' }}</td>
                                <td><button class="btn btn-danger"
                                        onclick="deleteProduct({{ $item->id }})">Delete</button></td>
                             
                            </tr>
                        @endforeach
                        </tbody>
                    </table>




                </div>
                    <!-- package edit start here -->
                    <div id="packageEditContainer" class="d-none">
                        <h1 class="text-center">Edit Packages</h1>
                        <input type="text" class="form-control w-50" placeholder="Add Package Name Here"
                            id="packageNameEditSearch">
                        <ul id="suggestions" style="cursor: pointer;"></ul>
                        <button class="btn btn-primary my-3" id="loadEditPackage">Load Package</button>
                        <div class="mt-4">
                            <div class="row">
                                <div class="col-md">
                                    <input type="text" class="form-control" placeholder="Package Name"
                                        id="packageNameEdit">
                                </div>
                                <div class="col-md mt-md-0 mt-3">

                                </div>
                                <div class="col-md  mt-md-0 mt-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Walking Time"
                                            id="walkingTimeEdit">
                                        <div class="input-group-text">min walking</div>


                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 ">
                                <div class="col">
                                    <small id="emailHelp" class="form-text text-muted">
                                        After writing one point, press Enter to start a new line for the next point

                                    </small>

                                    <textarea class="form-control" placeholder="Bullet Points" rows="10" id="pointFormEdit"></textarea>


                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <textarea class="form-control" placeholder="More Info" rows="10" id="infoTextEdit"></textarea>

                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <small id="emailHelp" class="form-text text-muted">For Better User Experience add
                                        short and attractive sentence

                                    </small>

                                    <textarea class="form-control" placeholder="Bottom Text" rows="10" id="bottomTextEdit"></textarea>

                                </div>
                            </div>


                            <div class="row mt-3">
                                <div class="col-md">
                                    <div class="col-md mt-md-0 mt-3">
                                        <div class="input-group">
                                            <span class="input-group-text">&pound;</span>

                                            <input type="number" class="form-control"
                                                placeholder="Price For 1-5 Days" id="oneFiveEdit">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="col-md mt-md-0 mt-3">
                                        <div class="input-group">
                                            <span class="input-group-text">&pound;</span>

                                            <input type="number" class="form-control"
                                                placeholder="Price For 5-7 Days" id="oneSevenEdit">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="col-md mt-md-0 mt-3">
                                        <div class="input-group">
                                            <span class="input-group-text">&pound;</span>

                                            <input type="number" class="form-control"
                                                placeholder="Price For Extra Day" id="extraDayEdit">

                                        </div>
                                    </div>
                                </div>
                                <div id="milstoneTableContainer" class="table-responsive">
                                    <table id="dataTable" class="table mt-5">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table rows will be added dynamically using JavaScript -->
                                        </tbody>
                                    </table>
                                    <div class="d-flex mt-3">

                                        <button id="addRow" class="btn btn-warning">Add Row</button>
                                        <button id="saveChanges" class="btn btn-info mx-2">Save Changes</button>

                                    </div>

                                </div>






                            </div>



                            <div class="text-center">
                                <button class="btn btn-primary mt-4 px-3" id="editPackageSubmitBtn">Edit
                                    Package</button>

                            </div>
                        </div>
                        <!-- form -->
                    </div>



                    <!-- package add end here -->

                    <!-- package Add start here -->
                    <div id="packageAddContainer" class="d-none">
                        <h1 class="text-center">Add Package</h1>
                        <for class="mt-4">
                            <div class="row">
                                <div class="col-md">
                                    <input type="text" class="form-control" placeholder="Package Name"
                                        id="packageName">
                                </div>

                                <div class="col-md  mt-md-0 mt-3">
                                    <div class="input-group">

                                        <input type="text" class="form-control" placeholder="Walking Time"
                                            id="walkingTime">
                                        <div class="input-group-text">
                                            min walking
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-4 ">
                                    <div class="col">
                                        <small id="emailHelp" class="form-text text-muted">After wrote one point,press
                                            the enter tab</small>

                                        <textarea class="form-control" placeholder="Bullet Points" rows="10" id="pointForm"></textarea>


                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <textarea class="form-control" placeholder="More Info" rows="10" id="infoText"></textarea>

                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <small id="emailHelp" class="form-text text-muted">For Better User Experience
                                            add short and attractive sentence

                                        </small>

                                        <textarea class="form-control" placeholder="Bottom Text" rows="10" id="bottomText"></textarea>

                                    </div>
                                </div>

                                </>



                                <div>

                                </div>
                                <div class="row mt-3">
                                    <div class="col-md">
                                        <div class="col-md mt-md-0 mt-3">
                                            <div class="input-group">
                                                <span class="input-group-text">&pound;</span>

                                                <input type="number" class="form-control"
                                                    placeholder="Price For 1-5 Days" id="oneFive">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="col-md mt-md-0 mt-3">
                                            <div class="input-group">
                                                <span class="input-group-text">&pound;</span>

                                                <input type="number" class="form-control"
                                                    placeholder="Price For 5-7 Days" id="oneSeven">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="col-md mt-md-0 mt-3">
                                            <div class="input-group">
                                                <span class="input-group-text">&pound;</span>

                                                <input type="number" class="form-control"
                                                    placeholder="Price For Extra Day" id="extraDay">

                                            </div>
                                        </div>
                                    </div>





                                </div>


                                <small class="text-muted mt-3">You can add milstone Dates & prices here</small>

                                <div class="row mt-1">
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-text">Dates</span>

                                            <input type="number" class="form-control"
                                                placeholder="Milstone In Dates" id="milestoneDate">

                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="input-group">
                                            <span class="input-group-text">&pound;</span>

                                            <input type="number" class="form-control" placeholder="Price"
                                                id="milstonePrice">

                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <button class="btn btn-primary" id="milstoneAdd">Add Milstone</button>
                                    </div>
                                </div>



                            </div>
                            <button onclick="addPackageJoke()" class="btn btn-primary mt-4 px-3">Add Package</button>

                    </div>
                    <!-- package End start here -->

                    <!-- active order load start here -->
                    <div id="activeOrderLoadContainer" class="d-none">
                        <h1 class="text-center mb-4">Active Orders</h1>
                        <div class="d-flex">
                            <input type="text" class="form-control w-25" placeholder="search by user id"
                                id="activeSearchInput">
                            <button class="btn btn-primary mx-2" id="activeSearchBtn">Search</button>
                        </div>
                        <div id="ActiveOrderTableContainer" class="table-responsive">
                            <table class="table table-bordered  mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Cancel Order</th>
                                        <th scope="col">Complete Order</th>
                                        <th scope="col">Print Ticket</th>


                                        <th scope="col">Parking Id</th>
                                        <th scope="col">User Id</th>

                                        <th scope="col">Arrival</th>
                                        <th scope="col">Exit</th>
                                        <th scope="col">Registation Number</th>
                                        <th scope="col">Flight Number</th>
                                        <th scope="col">Package Name</th>

                                        <th scope="col">Email</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Postal Code</th>


                                        <th scope="col">Payment Id</th>
                                        <th scope="col">Full Amount</th>
                                        <th scope="col">Order Date</th>




                                    </tr>
                                </thead>
                                <tbody id="activeOrderProfileBody">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- active order load end here -->
                    <!-- history order loas start here -->
                    <div id="historyOrderContainer" class="d-none">
                        <h1 class="mb-4 text-center">Order History</h1>
                        <div class="d-flex">
                            <input type="text" class="form-control w-25" placeholder="search by user id"
                                id="historySearchInput">
                            <button class="btn btn-primary mx-2" id="historySearchSubmit">Search</button>
                        </div>
                        <div id="historyOrderTableContainer" class=" table-responsive">
                            <table class="table table-bordered  mt-4">
                                <thead>
                                    <tr>

                                        <th scope="col">Parking Id</th>
                                        <th scope="col">User Id</th>

                                        <th scope="col">Arrival</th>
                                        <th scope="col">Exit</th>
                                        <th scope="col">Registation Number</th>
                                        <th scope="col">Flight Number</th>
                                        <th scope="col">Package Name</th>

                                        <th scope="col">Email</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Postal Code</th>


                                        <th scope="col">Payment Id</th>
                                        <th scope="col">Full Amount</th>
                                        <th scope="col">Order Date</th>


                                    </tr>
                                </thead>
                                <tbody id="historyOrderProfileBody">

                                </tbody>
                            </table>

                        </div>

                    </div>

                    <!-- histiry order load end here -->
                    <!-- Today Order load Start Here -->
                    <div id="todayOrderLoadContainer" class=" d-none">
                        <h1 class="text-center">Today Orders</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered  mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Cancel Order</th>
                                        <th scope="col">Complete Order</th>
                                        <th scope="col">Parking Id</th>
                                        <th scope="col">User Id</th>

                                        <th scope="col">Arrival</th>
                                        <th scope="col">Exit</th>
                                        <th scope="col">Registation Number</th>
                                        <th scope="col">Flight Number</th>
                                        <th scope="col">Package Name</th>

                                        <th scope="col">Email</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Postal Code</th>


                                        <th scope="col">Payment Id</th>
                                        <th scope="col">Full Amount</th>
                                        <th scope="col">Order Date</th>




                                    </tr>
                                </thead>
                                <tbody id="todayOrderLoadProfileBody">

                                </tbody>
                            </table>


                        </div>

                    </div>
                    <!-- today order load end here -->
                    <!-- cancel by admin order load start here -->
                    <div id="adminCancelOrderContainer" class="d-none">
                        <h1 class="text-center">Orders Cancel By Admin</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered  mt-4">
                                <thead>
                                    <tr>

                                        <th scope="col">Parking Id</th>
                                        <th scope="col">User Id</th>
                                        <th scope="col">Refund Amount</th>


                                        <th scope="col">Arrival</th>
                                        <th scope="col">Exit</th>
                                        <th scope="col">Registation Number</th>
                                        <th scope="col">Flight Number</th>
                                        <th scope="col">Package Name</th>

                                        <th scope="col">Email</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Postal Code</th>


                                        <th scope="col">Payment Id</th>
                                        <th scope="col">Full Amount</th>
                                        <th scope="col">Order Date</th>




                                    </tr>
                                </thead>
                                <tbody id="adminCancelOrderProfileBody">

                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!-- cancel by user order load end here -->

                    <!-- cancel by admin order load start here -->
                    <div id="userCancelOrderContainer" class="d-none">
                        <h1 class="text-center">Orders Cancel By Admin</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered  mt-4">
                                <thead>
                                    <tr>

                                        <th scope="col">Parking Id</th>
                                        <th scope="col">User Id</th>

                                        <th scope="col">Arrival</th>
                                        <th scope="col">Exit</th>
                                        <th scope="col">Registation Number</th>
                                        <th scope="col">Flight Number</th>
                                        <th scope="col">Package Name</th>

                                        <th scope="col">Email</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Telephone</th>
                                        <th scope="col">Postal Code</th>


                                        <th scope="col">Payment Id</th>
                                        <th scope="col">Full Amount</th>
                                        <th scope="col">Order Date</th>




                                    </tr>
                                </thead>
                                <tbody id="userCancelOrderProfileBody">

                                </tbody>
                            </table>

                        </div>

                    </div>
                    <!-- cancel by user order load end here -->

                    <!-- valet load stert here -->
                    <div id="valetLoadContainer" class="d-none">
                        <h1 class="text-center">Valet</h1>
                        <div class="row justify-content-center">
                            <div class="col-sm-4 mb-3">
                                <label for="selectType" class="form-label">Valet Packages</label>
                                <div class="input-group">
                                    <select class="form-select" id="selectType">
                                        <option selected value="Full Valet">Full Valet</option>
                                        <option value="Interior Valet">Interior Valet</option>
                                        <option value="Exterior Valet">Exterior Valet</option>
                                        <option value="Wash">Wash</option>
                                        <option value="Vac">Vac</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="selectVehicle" class="form-label">Vehicle Type</label>
                                <div class="input-group">
                                    <select class="form-select" id="selectVechle">
                                        <option selected value="Car">Car</option>
                                        <option value="4X4/MPV">4X4/MPV</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="valetPrice" class="form-label">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">&pound;</span>
                                    <input type="number" class="form-control" id="valetPrice"
                                        aria-label="Amount (to the nearest dollar)">
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-success" onclick="updateValet()">Update</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered  mt-4">
                                <thead>
                                    <tr>

                                        <th scope="col">Valet Id</th>
                                        <th scope="col">Valet Type</th>

                                        <th scope="col">Vehicle</th>
                                        <th scope="col">Price</th>



                                    </tr>
                                </thead>
                                <tbody id="valetLoadProfileBody">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- valet end her -->

                    <!-- admin home start here -->
                    <div id="adminHomeContainer">

                        <h1>Quick Access</h1>
                        <div class="header-container d-md-flex justify-content-md-around mt-3">
                            <div class="card text-white bg-primary mb-3" style="min-width: 13rem;"
                                id="tooltipOpener">
                                <div class="card-header">Total Active Orders</div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <span class="middleNumber" id="availableSlot">
                                        {{$toatalActiveOrders}}
                                    </span>


                                </div>
                                <div class="text-center mb-2" id="arrowIcon"><i class="bi bi-arrow-down-circle"></i>
                                </div>
                                <div id="editingSection" class="d-none">
                                    <div class="text-center mx-4">
                                        <input type="text" class="form-control" placeholder="New Parking Slot"
                                            id="inputSlot">

                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-success text-center mt-2"
                                            id="newParkingSlotSubmit">Submit</button>

                                    </div>


                                </div>
                            </div>

                            <div class="card text-white bg-warning mb-3" style="min-width: 13rem;">
                                <div class="card-header">Total History Orders</div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <span class="middleNumber" id="totalUser">
                                        {{$toatlHistoryOrders}}
                                    </span>

                                </div>
                            </div>

                            <div class="card text-white bg-danger mb-3 " style="min-width: 13rem;">
                                <div class="card-header text-center">
                                    Total Products
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <span class="middleNumber" id="totalAmount"></span><span
                                        class="middleNumber">
                                        {{$totalProducts}}
                                    </span>

                                </div>
                            </div>

                            <div class="card text-white bg-success mb-3" style="min-width: 13rem;">
                                <div class="card-header text-center">Total Categories</div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <span class="middleNumber" id="monthAmont"></span><span
                                        class="middleNumber">
                                        {{$totalCategories}}
                                    </span>

                                </div>
                            </div>
                        </div>

                        <div class="seconnd-container mt-3">

                            <h1>Today's Active Orders</h1>

                            <table class="table mt-4">
                                <thead>
                                    <tr>
        
                                        <th scope="col">Product Name</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">User Phone</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                       
                                    
                                        
                                    </tr>
                                </thead>
                                <tbody >
        
                                    @foreach ($activeOrders as $item)
                                    <tr >
                                        <td>{{ $item->order_line->product->name ?? 'N/A' }}</td>
                                        <td>{{ $item->user->first_name ?? 'N/A' }}</td>
                                        <td>{{ $item->user->email ?? 'N/A' }}</td>
                                        <td>{{ $item->user->phone ?? 'N/A' }}</td>
                                        <td>{{ $item->order_line->quantity ?? 'N/A' }}</td>
                                        <td>{{ $item->order_line->total_price ?? 'N/A' }}</td>
                                       
                                     
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           


                            <!-- admin home end here -->

                            <div class="second-container mt-3 d-none">
                                <h1>Today's Departing Vehicles</h1>
                                <div class="table-responsive">
                                    <table class="table table-bordered  mt-4">
                                        <thead>
                                            <tr>

                                                <th scope="col">Parking Id</th>
                                                <th scope="col">Arrival</th>
                                                <th scope="col">Exit</th>



                                                <th scope="col">Payment Id</th>
                                                <th scope="col">Full Amount</th>
                                                <th scope="col">Order Date</th>

                                                <th scope="col">Cancel Order</th>
                                                <th scope="col">Complete Order</th>


                                            </tr>
                                        </thead>
                                        <tbody id="homeActiveOrderProfileBody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>



                        </div>

                    </div>
        </main>

    </div>
</div>



<div class="toast-container position-fixed bottom-0 end-0 p-3"></div>

<div class="modal" tabindex="-1" role="dialog" id="cancelModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="formGroupExampleInput">Add Amount</label>
                    <input type="number" class="form-control" id="cancelAmount" placeholder="Example input">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="cancelRefundBtn">Make Refund</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                    id="cancelwithoutrefundBtn">Cancel Without Payment</button>
            </div>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
