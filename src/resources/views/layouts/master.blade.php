<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">   
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>

    



    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('/css/sb-admin-2.min.css') }}" rel="stylesheet">






</head>

<body id="page-top">






    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center " href="/">
                
                <div class="sidebar-brand-text mx-2">Agenda de Contatos</div>

            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="/AdicionarContato" >                    
                    <span>Adicionar Novo Contato</span>
                </a>
                
            </li>

            <!--
            <li class="nav-item">
                <i class="fab fa-google-plus-g"></i>
                <a class="nav-link collapsed" href="#utilities" >
                    <span>Vincular Contatos Google</span>
                </a>                
            </li>
            -->

            <li class="nav-item">
                <i class="fab fa-google-plus-g"></i>
                <a class="nav-link collapsed" href="/logout" >
                    <span>LogOut</span>
                </a>                
            </li>

            <hr class="sidebar-divider">

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    


                        <div class="input-group">
                            <input type="text" id="tags" class="form-control bg-light border-0 small" placeholder="..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <span class="material-icons">search</span>
                                </button>
                            </div>
                        </div>



                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">                                                 
                                                <span class="material-icons">search</span>                                       
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>

                
                <div class="container-fluid">                        
                    <div class="row">
                        <div class="col-lg-24 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">@yield('card-name')</h6>                                    
                                </div>                                
                                <div class="card-body">
                                    <div class="text-center">
                                    
                                    @yield('content')

                                    </div>                                    
                                </div>
                            </div>
                            
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">                                    
                                </div>
                                <div class="card-body">
                                    <p style="color:white;cursor: context-menu;">SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                                        CSS bloat and poor page performance. Custom CSS classes are used to create
                                        custom components and custom utility classes.</p>
                                    <p style="color:white;cursor: context-menu;" class="mb-0">Before working with this theme, you should become familiar with the
                                        Bootstrap framework, especially the utility classes.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Agenda Vex 2021</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>
</body>

</html>
