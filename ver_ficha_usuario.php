<?php
include_once("layout/head.php");
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
              
                <div class="x_panel">
                  <!--lugar para os tipos de capturas -->

                  <div class="x_content">
                      <?php
                        //A pagina começa aqui
                        $id = $_GET['id_per'];
                        $sql = "SELECT * FROM persona p LEFT JOIN classe c ON p.id_per = c.id_per  LEFT JOIN tbl_fotos f ON p.id_per = f.id_per where p.id_per =$id";
                        $result = mysqli_query($_SESSION['conexao'],$sql);
                        $linha = mysqli_fetch_array($result, MYSQLI_ASSOC);

                      ?>
                      <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                        <div class="x_title">
                          
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                              <div id="crop-avatar">
                                <!-- Current avatar -->
                                <p class="per"><?php echo '<img src="images/perfil/'.$linha['nomemd5_foto'].'" alt="..." class="img-circle profile_img">';?></p>
                              </div>
                            </div>
                            
                            <h2><?php echo $linha['nomeper'].', '.$linha['idade'].' anos';?></h2>
                            <h2><i class="fa fa-map-marker user-profile-icon"></i><?php echo $linha['regiao'].', '.$linha['cidade']?></h2>

                            <div class="clearfix"></div>
                            
                            <!-- start skills -->
                            <h4>Skills</h4>
                                                        
                            <ul class="list-unstyled user_data">
                              <?php
                                $id = $_GET['id_per'];
                                
                                $sql = "SELECT p.skill,p.spontos,p.id_skill FROM skill p LEFT JOIN personagem d ON p.id_per = d.id where id_per=$id and spontos >0";
                                $roda_skill = mysqli_query($_SESSION['conexao'],$sql);

                                while($result = mysqli_fetch_array($roda_skill, MYSQLI_ASSOC)){
                                echo'<li>'.$result['skill'].': '.$result['spontos'].'<a href="perfil.php?up=user&id='.$result['id_skill'].'"> + </a> <a href="perfil.php?del=user&id='.$result['id_skill'].'"> - </a></li>';}
                              ?>
                              
                            </ul>
                            <!-- end of skills -->

                          </div>
                          <div class="col-md-9 col-sm-9 ">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">

                              <article class="tb-responsiva">
                                <!--Personagem-->

                                <section>
                                  <ul class="list-unstyled user_data">

                                    <li><i class="fa fa-heart"></i> Hp: <?php echo $linha['hp'];?></li> 
                                    
                                    <li><i class="fa fa-bolt"></i> Stamina: <?php echo $linha['stamina'];?></li>

                                    <li><i class="fa fa-bicycle"></i> Deslocamento: <?php echo $linha['desloc'];?></li>
                                  </ul>
                                </section>

                               <!-- <section class="cont">
                                   <ul class="list-unstyled user_data">
                                  <li><i class="fa fa-trophy"></i>Insignias:<?php echo $linha['insig']; ?></li>
                                   <li>Pokemons:<?php echo pokeTotal(); ?></li>
                                    <li>Pokebola: <?php echo pokePokebola(); ?></li>
                                    <li>Presente: <?php echo pokePresente(); ?></li>
                                    <li>Recompensa: <?php echo pokeRecompensa(); ?></li>
                                    <li>Ovo: <?php echo pokeOvo(); ?></li>
                                    <li>Focil: <?php echo pokeFocil(); ?></li>
                                  </ul>
                                </section>-->

                                <section class="cont">
                                  <ul class="list-unstyled user_data">
                                  <li>Mundial:</li>
                                  <li><i class="fa fa-trophy"></i>Ranking:<?php echo $linha['mundial']; ?></li>
                                  <li><i class="fa fa-trophy"></i>Pontuação:<?php echo $linha['pt_mundial']; ?></li>
                                    
                                </section>
                                
                                <section class="cont">
                                  <ul class="list-unstyled user_data">
                                  <li>Carteira:</li>
                                  <li><i class="fa fa-trophy"></i>P.d:<?php echo $linha['pd']; ?></li>
                                  <li><i class="fa fa-trophy"></i>Insignias:<?php echo $linha['insig']; ?></li>
                                    
                                </section>

                              </article>
                              
                              <div  class="classe">
                                <div class="ln_solid"></div>
                                <h3><strong><?php echo ucwords($linha['nomeclas'])?></strong></h3> 

                                <ul class="list-unstyled user_data">
                                  <li><strong>Efeito:</strong> <?php echo ucfirst($linha['efeito'])?></li>

                                  <li><strong>Bonus:</strong> <?php echo ucfirst($linha['bonus'])?></li>

                                  <li><strong>Afinidade:</strong> <?php echo ucfirst($linha['afinidade'])?></li>

                                  <li><strong>Poder de Torcida: </strong><?php echo ucfirst($linha['ptorcida'])?></li>

                                  <li><strong>Evolução:</strong> <?php echo ucfirst($linha['evo'])?></li>
                                </ul>
                                
                              </div>
                              </div>
                              
                            </div>
                        </div>
                              <h3 style="margin-top: 90px;"><strong>Itens da Mochila</strong></h3>
                  
                              <div class="x_content">

                              <table class="table table-hover">
                                  <thead>
                                      <tr>
                                      <th>Peso Total </th>
                                      <th>Nome</th>
                                      <th>Quantidade</th>
                                      <th>Peso do Item</th>
                                      <th>-</th>
                                      
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      $id_per= $_GET['id_per'];
                                      $sql = "SELECT * from mochila where qnt_item !=0 and id_per=$id_per";
                                      $result = mysqli_query($_SESSION['conexao'],$sql);
                                      while($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                      echo '
                                      <tr>
                                      <td>'.$linha['qnt_item']*$linha['peso_usado'].'</td>
                                      <td>'.$linha['nome_item'].'</td>
                                      <td>'.$linha['qnt_item'].'</td>
                                      <td>'.$linha['peso_usado'].'</td>
                                      
                                      </tr>';
                                      }
                                      ?>
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
          </div>
        </div>
        <!-- /page content -->

<?php
include_once("layout/footer.php");
?>