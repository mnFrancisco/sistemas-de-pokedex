<?php
include_once("layout/head.php");
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Perfis</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <!--<ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>-->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div >
                      <?php
                        // select nos bancos quem tem aver com  o usuario
                        $sql = "SELECT *
                        FROM persona p LEFT JOIN classe c ON p.id_per = c.id_per LEFT JOIN tbl_fotos f ON p.id_per = f.id_per";
                        $result = mysqli_query($_SESSION['conexao'],$sql);
                    
                        while($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            echo '
                                <div class="col-md-4 col-sm-4  profile_details perfils">
                                <div class="well profile_view">
                                <div class="col-sm-12">
                                    <div class="left col-sm-7">
                                    <h2>'.$linha['nomeper'].'</h2>

                                    <p><strong>Classe: </strong>'.ucfirst($linha['nomeclas']).' </p>

                                    <p><i class="fa fa-building"></i>Cidade: '.$linha['regiao'].',
                                    '.$linha['cidade'].'</p>
                                    
                                    </div>
                                    <div class="right col-sm-5 text-center">
                                    <img src="images/perfil/'.$linha['nomemd5_foto'].'" alt="" class="img-circle img-fluid">
                                    </div>
                                </div>
                                
                                    <div class=" col-sm-6 emphasis">
                                    <button type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-users"> </i> <a href="ver_ficha_usuario.php?id_per='.$linha['id_per'].'">Ver Ficha</a>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm">
                                    &#9683; <a href="ver_ficha_usuario_poke.php?id_per='.$linha['id_per'].'">Ver Pokemons</a>
                                    </button>
                                    </div>
                                </div>
                                </div>
                            </div>
                          ';
                        }
                      ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
include_once("layout/footer.php");
?>