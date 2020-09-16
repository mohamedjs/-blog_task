
    <!-- Navigation -->
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class=" nav-link active " href="{{ route('admin.home.index') }}">
                <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.users.index") }}">
                <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Users
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.categories.index") }}">
                <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Categories
            </a>
        </li>        

        <li class="nav-item">
            <a class="nav-link " href="{{ route("admin.articles.index") }}">
                <img src="{{ asset('./assets/img/brand/blue.png') }}" class="mr-1" width="30px" height="30px" alt="..."> Articles
            </a>
        </li>

       
    </ul>
