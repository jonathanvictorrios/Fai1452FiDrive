
<div class="container-fluid ">
    <div class="row ">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-info ">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <?php
                    $res=$objSession->validar();
                    if($res){
                        ?>
                        <div class="alert alert-secondary text-center" role="alert">
                            <p class="font-weight-bold">Bienvenid@
                            <?php
                                $loginUsuario=$objSession->getLoginUsuario();
                                echo $loginUsuario;
                    }
                            ?>
                            </p>
                    </div>
                        
                        
                        
                    
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../vista/contenido.php">
                            contenido php
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../vista/compartidos.php">
                            compartidos php
                        </a>
                    </li>
                    
                    <?php
                        $verificarRol=$objSession->verificarRol("Administrador");
                        if($verificarRol){
                        ?> 
                             <li class="nav-item">
                                <a class="nav-link text-white" href="../vista/listaUsuarios.php">
                                    Lista usuarios
                                </a>
                            </li>
                        <?php
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="../vista/logout.php">
                            Cerrar sesion
                        </a>
                    </li>
                    
                    
                </ul>

                
                
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
        