<?php
include_once("layout/head.php");
$id_per = $_SESSION['id'];

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de Pokemon</h3>
              </div>
            </div>

            <div class="clearfix"></div>
            <?php
            if(isset($_GET['del']) == 'user'){
              $sql="UPDATE poke SET status = 1 WHERE id_poke = ".$_GET['id'];
              $resp_sql = mysqli_query($_SESSION['conexao'],$sql);

              if($resp_sql){
                echo'<div class="alert alert-info alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Sucesso!</strong> Pokemon enviado para o Time !
                </div>';
              }else{
                echo'<div class="alert alert-warning alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Erro !</strong> Não é possivel enviar o pokemo para o Time !!!!.
                </div>';
              }
            }
            ?>
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
                  <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table table-hover">
                      
                    </table>
                      <main>
                          <section class="timepoke">
                            <!--lucario <a href="editar_usuarios.php?id='.$linha['id_poke'].'"> <img src="images/lapis.png" height="18px" width="18px"></a>
                            <a href="listar_time.php?del=user&id='.$linha['id_poke'].'">🖥️</a>-->
                            <article>
                              <?php
                              $quantidade=3;
                              $pagina = isset($_GET['pagina']) ? (INT)$_GET['pagina'] :1;
                              $inicio = ($quantidade * $pagina) - $quantidade;

                              $sql = "SELECT * from poke WHERE status = 0 and id_per=$id_per order by id_poke desc LIMIT $inicio,$quantidade";

                              $result = mysqli_query($_SESSION['conexao'],$sql);
                              while($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $nome= trim(strtolower($linha['nome']));
                                $shiny= strtolower($linha['shyni']);

                                if($linha['regiao']  == 'paldeia'){
                                  $imagem='<a href="https://pokemondb.net/pokedex/'.$nome.'"><img src="https://img.pokemondb.net/sprites/scarlet-violet/'.$shiny.'/'.$nome.'.png" alt="'.$nome.'"></a>';
                                }else{
                                  $imagem='<a href="https://pokemondb.net/pokedex/'.$nome.'" target="_blank"><img src="https://img.pokemondb.net/sprites/home/'.$shiny.'/'.$nome.'.png" alt="'.$nome.'"></a>';
                                }
                              echo'
                                <div  class="pokeimg">
                                    '.$imagem.'
                                    
                                    <h3>'.trim(ucfirst($nome)).'</h3>

                                    <a class="link_icon" href="editar_usuarios.php?'.md5($linha['nome']).'&'.md5($linha['shyni']).'&id='.$linha['id_poke'].'"><i class="fa fa-edit"></i></a>
                                    
                                    <a class="link_icon" href="listar_pc.php?'.md5($linha['nome']).'&'.md5($linha['shyni']).'&del=user&id='.$linha['id_poke'].'"><i class="fa fa-sign-out"></i></a>

                                    <p><strong>Lv:</strong> '.$linha['lv'].' <br/>  <strong>Habilit:</strong> '.$linha['hab'].' <br/> <strong>Nature:</strong> '.$linha['nature'].' <br/> <strong>Tera type:</strong> '.$linha['t_type'].'</p> <br>
                                    
                                    
                                    <ul class="pokestatus">
                                        <li>Hp: '.$linha['hp'].'</li>
                                        <li>Atk: '.$linha['atk'].' </li>
                                        <li>Def: '.$linha['def'].'</li>
                                        <li>Esp.Atk: '.$linha['satk'].'</li>
                                        <li>Esp.Def: '.$linha['sdef'].'</li>
                                        <li>Speed: '.$linha['speed'].'</li>
                                        <li>Deslocamento: '.$linha['desloc'].'</li>
                                        <li>Amizade: '.$linha['ami'].'</li>
                                    </ul>
                                      
                                    <p><strong>Moves:</strong> '.$linha['moves'].'</p> <br>
                                </div>';}
                                ?>
                            </article>
                          </section>
                      </main>
                        <?php
                        $sqlTotal   = "SELECT id_poke FROM poke where status =0";
                      
                        $qrTotal    = mysqli_query($con, $sqlTotal) or die(mysqli_error());
                      
                        $numTotal   = mysqli_num_rows($qrTotal);
                      
                        $totalPagina= ceil($numTotal/$quantidade);
                      
                        $exibir = 3;
                      
                        $anterior  = (($pagina - 1) == 0) ? 1 : $pagina - 1;
                      
                        $posterior = (($pagina+1) >= $totalPagina) ? $totalPagina : $pagina+1;
                      
                          ?>
                          <div id="navegacao">
                              <?php
                              echo '<a href="?pagina=1">primeira</a> | ';
                              echo "<a href=\"?pagina=$anterior\">anterior</a> | ";
                        
                        for($i = $pagina-$exibir; $i <= $pagina-1; $i++){
                          if($i > 0)
                            echo '<a href="?pagina='.$i.'"> '.$i.' </a>';
                        }
                      
                        echo '<a href="?pagina='.$pagina.'"><strong>'.$pagina.'</strong></a>';
                      
                        for($i = $pagina+1; $i < $pagina+$exibir; $i++){
                          if($i <= $totalPagina)
                            echo '<a href="?pagina='.$i.'"> '.$i.' </a>';
                        }
                      
                        echo " | <a href=\"?pagina=$posterior\">próxima</a> | ";
                          echo "  <a href=\"?pagina=$totalPagina\">última</a>";
                          ?>
                      </div>
                  </div>
                </div>
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