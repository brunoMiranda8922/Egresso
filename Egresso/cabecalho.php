    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Meta tags obrigatórias-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Title Página-->
        <title>FATEC BARUERI</title>
        <link rel="icon" href="images/estudo.ico">
        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
        <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
        <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

        <!-- Vendor CSS-->
        <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
        <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
        <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all">

    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="index.html">
                                <img src="images/fatec.png" alt="FATEC" />
                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li>
                                <a href="home.php">
                                    <i class="fas fa-tachometer-alt"></i>Home</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-search"></i>Alunos</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="comercioExterior.php">Consultar Egressos</a>
                                    </li>
                                    <li>
                                        <a href="eventos.php">Feedback</a>
                                    </li>
                                    <li>
                                        <a href="avaliacao.php">Avaliação dos Egressos</a>
                                    </li>
                                    

                                </ul>
                            </li>
                            <li>
                                <a href="chart.php">
                                    <i class="fas fa-chart-bar"></i>Metricas</a>
                            </li>
                            
                            <li>
                                <a href="form.php">
                                    <i class="fas fa-user"></i>Cadastrar</a>
                            </li>
                            <li>
                                <a href="contato.php">
                                    <i class="zmdi zmdi-email-open"></i>Contato</a>
                            </li>
                           
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                            
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                    <li>
                                        <a href="backup.php">Fazer Backup</a>
                                    </li>
                                    <li>
                                        <a href="exporta.php">Exportar para CSV</a>
                                    </li>
                                    <li>
                                        <a href="curso.php">Novo Curso</a>
                                    </li>
                                   
                                </ul>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="images/barueri1.png" alt="FATEC" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="home.php">
                                    <i class="fas fa-tachometer-alt"></i>Home</a>
                            </li>
            
                            <li class="active has-sub">
                                
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-search"></i> Alunos</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                    
                                    <li>
                                    
                                        <a href="comercioExterior.php">Consultar Egressos
                                        
                                        </a>
                                    </li>
                                    <li>
                                        <a href="eventos.php">Feedback</a>
                                    </li>
                                    <li>
                                        <a href="avaliacao.php">Avaliação dos Egressos</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="chart.php">
                                    <i class="fas fa-chart-bar"></i>Metricas</a>
                            </li>
                           
                            <li>
                                <a href="form.php">
                                    <i class="fas fa-user"></i>Cadastrar</a>
                            </li>
                            <li>
                                <a href="contato.php">
                                    <i class="zmdi zmdi-email-open"></i>Contato</a>
                            </li>
                            
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fa fa-save"></i>Opções</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="backup.php">Efetuar Backup</a>
                                    </li>
                                    
                                    <li>
                                        <a href="exporta.php">Exportar para CSV</a>
                                    </li>
                                    <li>
                                        <a href="curso.php">Novo Curso</a>
                                    </li>
                                </ul>
                            </li>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">
                                
                                <div class="header-button">
                                    <div class="noti-wrap">
                                        <div class="noti__item js-item-menu">
                                            
                                            
                                            <div class="mess-dropdown js-dropdown">
                                                
                                            </div>
                                        </div>
                                        <div class="noti__item js-item-menu">
                                            <button class="btn btn-secondory"></button>
                                            <i class="fa  fa-hand-o-right"></i>
                                            <div class="email-dropdown js-dropdown">
                                                
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="noti__item js-item-menu">
                                            
                                            
                                            <div class="notifi-dropdown js-dropdown">
                                                
                                                
                                                <div class="notifi__item">
                                                    <div class="bg-c2 img-cir img-40">
                                                        <i class="zmdi zmdi-account-box"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>Your account has been blocked</p>
                                                        <span class="date">April 12, 2018 06:50</span>
                                                    </div>
                                                </div>
                                                <div class="notifi__item">
                                                    <div class="bg-c3 img-cir img-40">
                                                        <i class="zmdi zmdi-file-text"></i>
                                                    </div>
                                                    <div class="content">
                                                        <p>You got a new file</p>
                                                        <span class="date">April 12, 2018 06:50</span>
                                                    </div>
                                                </div>
                                                <div class="notifi__footer">
                                                    <a href="#">All notifications</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="image">
                                                <img src="images/profe.png" alt="FATEC BARUERI" />
                                            </div>
                                            <div class="content">
                                                <a class="js-acc-btn" href="#">FATEC BARUERI</a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="info clearfix">
                                                    <div class="image">
                                                        <a href="#">
                                                            <img src="images/profe.png" alt="FATEC BARUERI" />
                                                        </a>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="name">
                                                            <a href="#">FATEC BARUERI</a>
                                                        </h5>
                                                        
                                                        <span class="email">adm@fatec.com</span>
                                                    </div>
                                                </div>
                                                <div class="account-dropdown__body">
                                                    
                                                </div>
                                                <div class="account-dropdown__footer">
                                                    <a href="logout.php">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <?php echo date('d-m-Y'); ?> <br>    
                                <?php echo date('H:i:s'); ?>
                                     
                            </div>
                        </div>
                    </div>
                </header>
            <!-- HEADER DESKTOP-->
