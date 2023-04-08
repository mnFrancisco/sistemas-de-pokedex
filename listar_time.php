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
              $sql="UPDATE poke SET status = 0 WHERE id_poke = ".$_GET['id'];
              $resp_sql = mysqli_query($_SESSION['conexao'],$sql);

              if($resp_sql){
                echo'<div class="alert alert-info alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Sucesso!</strong> Pokemon enviado para o PC !
                </div>';
              }else{
                echo'<div class="alert alert-warning alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Erro !</strong> Não é possivel enviar o pokemo para o PC !!!!.
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
                              $id=0;
                              $sql = "SELECT * from poke WHERE status = 1 and id_per=$id_per ORDER BY poke.lv DESC";
                              $result = mysqli_query($_SESSION['conexao'],$sql);
                              while($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $nome= trim(strtolower($linha['nome']));
                                $shiny= strtolower($linha['shyni']);

                                if($linha['regiao']  == 'paldeia'){
                                  $imagem='<a href="https://pokemondb.net/pokedex/'.$nome.'"><img src="https://img.pokemondb.net/sprites/scarlet-violet/'.$shiny.'/'.$nome.'.png" alt="'.$nome.'"></a>';
                                }else{
                                  $imagem='<a href="https://pokemondb.net/pokedex/'.$nome.'" target="_blank"><img src="https://img.pokemondb.net/sprites/home/'.$shiny.'/'.$nome.'.png" alt="'.$nome.'"></a>';
                                }
                                
                                $id++;
                              echo'
                                <div  class="pokeimg">';?><button onclick="toggleVisibility('elemento<?php echo $id ?>')">Mostrar/Ocultar</button><br> <?php
                                echo'
                                  '.$imagem.'

                                  <h3>'.trim(ucfirst($nome)).'</h3>

                                  <div id="elemento'.$id.'">
                                    <a class="link_icon" href="editar_usuarios.php?'.md5($linha['nome']).'&'.md5($linha['shyni']).'&id='.$linha['id_poke'].'"><i class="fa fa-edit"></i></a>
                                    <a class="link_icon" href="listar_time.php?'.md5($linha['nome']).'&'.md5($linha['shyni']).'&del=user&id='.$linha['id_poke'].'">🖥️</a>
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
                                  </div>

                                </div>';}
                                ?>
                            </article>
                          </section>
                      </main>

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