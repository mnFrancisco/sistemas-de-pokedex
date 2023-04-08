<?php
include_once("layout/head.php");

$fichaPer=fichaPer();
$fichaClas=fichaClas();
$fichaSkill=fichaSkill();

// status hp mais
if(isset($_GET[md5('hp_mais')]) == md5('hp_mais')){
  $sql="SELECT hp From persona WHERE id_persona = ".$_GET[md5('hp_mais')];
  $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
  $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);

  if($resp_sql){
    $menus = $linha['hp'] + 1;
    
    $menos_sql="UPDATE persona SET hp = $menus WHERE id_persona = ".$_GET[md5('hp_mais')];
    $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);

    $sql="SELECT hp From persona WHERE id_persona = ".$_GET[md5('hp_mais')];
    $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
    $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);
    
  }else{
    echo'<div class="alert alert-warning alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Erro !!.
    </div>';
  }
}

// status hp menos
if(isset($_GET[md5('hp_menos')]) == md5('hp_menos')){
  $sql="SELECT hp From persona WHERE id_persona = ".$_GET[md5('hp_menos')];
  $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
  $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);

  if($resp_sql){
    $menus = $linha['hp'] - 1;
    
    $menos_sql="UPDATE persona SET hp = $menus WHERE id_persona = ".$_GET[md5('hp_menos')];
    $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);

    $sql="SELECT hp From persona WHERE id_persona = ".$_GET[md5('hp_menos')];
    $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
    $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);
    
    
  }else{
    echo'<div class="alert alert-warning alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Erro !!.
    </div>';
  }
}

// status estamina mais
if(isset($_GET[md5('stamina_mais')]) == md5('stamina_mais')){
  $sql="SELECT stamina From persona WHERE id_persona = ".$_GET[md5('stamina_mais')];
  $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
  $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);

  if($resp_sql){
    $menus = $linha['stamina'] + 1;
    
    $menos_sql="UPDATE persona SET stamina = $menus WHERE id_persona = ".$_GET[md5('stamina_mais')];
    $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);

    $sql="SELECT stamina From persona WHERE id_persona = ".$_GET[md5('stamina_mais')];
    $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
    $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);
    
  }else{
    echo'<div class="alert alert-warning alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Erro !!.
    </div>';
  }
}

// status estamina menos
if(isset($_GET[md5('stamina_menos')]) == md5('stamina_menos')){
  $sql="SELECT stamina From persona WHERE id_persona = ".$_GET[md5('stamina_menos')];
  $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
  $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);

  if($resp_sql){
    $menus = $linha['stamina'] - 1;
    
    $menos_sql="UPDATE persona SET stamina = $menus WHERE id_persona = ".$_GET[md5('stamina_menos')];
    $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);

    $sql="SELECT stamina From persona WHERE id_persona = ".$_GET[md5('stamina_menos')];
    $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
    $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);
    
    
  }else{
    echo'<div class="alert alert-warning alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Erro !!.
    </div>';
  }
}

// status deslocamento mais
if(isset($_GET[md5('desloc_mais')]) == md5('desloc_mais')){
  $sql="SELECT desloc From persona WHERE id_persona = ".$_GET[md5('desloc_mais')];
  $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
  $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);

  if($resp_sql){
    $menus = $linha['desloc'] + 1;
    
    $menos_sql="UPDATE persona SET desloc = $menus WHERE id_persona = ".$_GET[md5('desloc_mais')];
    $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);

    $sql="SELECT desloc From persona WHERE id_persona = ".$_GET[md5('desloc_mais')];
    $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
    $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);
    
  }else{
    echo'<div class="alert alert-warning alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Erro !!.
    </div>';
  }
}
// status deslocamento menos
if(isset($_GET[md5('desloc_menos')]) == md5('desloc_menos')){
  $sql="SELECT desloc From persona WHERE id_persona = ".$_GET[md5('desloc_menos')];
  $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
  $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);

  if($resp_sql){
    $menus = $linha['desloc'] - 1;
    
    $menos_sql="UPDATE persona SET desloc = $menus WHERE id_persona = ".$_GET[md5('desloc_menos')];
    $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);

    $sql="SELECT desloc From persona WHERE id_persona = ".$_GET[md5('desloc_menos')];
    $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
    $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);
    
    
  }else{
    echo'<div class="alert alert-warning alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Erro !!.
    </div>';
  }
} 

// insert skill
if(isset($_POST['skill']) != '' ){
  $id = $_SESSION['id'];
  $skill = $_POST['skill'];
  $sponto = $_POST['pontos'];

  $sql ="INSERT INTO skill (id_per,skill,spontos) value ($id,'$skill','$sponto')";
  $r_sql = mysqli_query($_SESSION['conexao'],$sql);
}
// skill mais 1
if(isset($_GET['up']) == 'user'){

  $sql="SELECT spontos From skill WHERE id_skill = ".$_GET['id'];
  $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
  $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);

  if($resp_sql){
    $menus = $linha['spontos'] + 1;
    

    $menos_sql="UPDATE skill SET spontos = $menus WHERE id_skill = ".$_GET['id'];
    $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);


    $sql="SELECT spontos From skill WHERE id_skill = ".$_GET['id'];
    $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
    $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);
    
  }else{
    echo'<div class="alert alert-warning alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Erro !!.
    </div>';
  }
}
// skill menos 1
if(isset($_GET['del']) == 'user'){
  $sql="SELECT spontos From skill WHERE id_skill = ".$_GET['id'];
  $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
  $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);

  if($resp_sql){
    $menus = $linha['spontos'] - 1;
    
    $menos_sql="UPDATE skill SET spontos = $menus WHERE id_skill = ".$_GET['id'];
    $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);

    $sql="SELECT spontos From skill WHERE id_skill = ".$_GET['id'];
    $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
    $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);
    
  }else{
    echo'<div class="alert alert-warning alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <strong>Erro !!.
    </div>';
  }
}

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

                      ?>
                      <div class="col-md-12 col-sm-12 ">
                      <div class="x_panel">
                        <div class="x_title">
                          <form action="perfil.php" method="POST">
                                <div class="input-group">
                                  <input type="text" class="form-control" name="skill" placeholder="Inserir habilidade">
                                  
                                  <input type="text" class="form-control" name="pontos" placeholder="Inserir Pontos">

                                  <span class="input-group-btn">
                                    <input class="btn btn-secondary" type="submit"></input>
                                  </span>
                                </div>
                              </form>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                              <div id="crop-avatar">
                                <!-- Current avatar -->
                                <p class="per"><?php echo fichaFoto()?></p>
                              </div>
                            </div>
                            <?php 
                              if($fichaPer == false){
                                echo '<strong><big>Crie seu perfil <a href="criar_per.php">aqui</a></big></strong>';exit();
                              }?>
                            <h2><?php echo $fichaPer['nomeper'].', '.$fichaPer['idade'].' anos';?></h2>
                            <h2><i class="fa fa-map-marker user-profile-icon"></i><?php echo $fichaPer['regiao'].', '.$fichaPer['cidade']?></h2>

                            <div class="clearfix"></div>
                            
                            <!-- start skills -->
                            <h4>Skills</h4>
                                                        
                            <ul class="list-unstyled user_data">
                              <?php
                                $id = $_SESSION['id'];
                                $sql = "SELECT p.skill,p.spontos,p.id_skill FROM skill p LEFT JOIN personagem d ON p.id_per = d.id where id_per=$id and spontos >0";

                                $result = mysqli_query($_SESSION['conexao'],$sql);
                                while($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                echo'<li>'.$linha['skill'].': '.$linha['spontos'].'<a href="perfil.php?up=user&id='.$linha['id_skill'].'"> + </a> <a href="perfil.php?del=user&id='.$linha['id_skill'].'"> - </a></li>';}
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
                                    <li>Hp: <?php echo $fichaPer['hp'].'<a href="perfil.php?'.md5('hp_mais').'='.$fichaPer['id_persona'].'"> + </a> 
                                    <a href="perfil.php?'.md5('hp_menos').'='.$fichaPer['id_persona'].'"> - </a>';?></li>

                                    <li>Stamina: <?php echo $fichaPer['stamina'].'<a href="perfil.php?'.md5('stamina_mais').'='.$fichaPer['id_persona'].'"> + </a> 
                                    <a href="perfil.php?'.md5('stamina_menos').'='.$fichaPer['id_persona'].'"> - </a>';?></li>

                                    <li>Deslocamento: <?php echo $fichaPer['desloc'].'<a href="perfil.php?'.md5('desloc_mais').'='.$fichaPer['id_persona'].'"> + </a> 
                                    <a href="perfil.php?'.md5('desloc_menos').'='.$fichaPer['id_persona'].'"> - </a>';?></li>

                                    <li>Id.Treinador: <?php echo $fichaPer['id_trei']?></li>  
                                  </ul>
                                </section>


                                <section class="cont">
                                  <ul class="list-unstyled user_data">
                                    <li>Mundial:</li>
                                    <li>Ranking: <?php echo $fichaPer['mundial']; ?></li>
                                    <li>Pontuação: <?php echo $fichaPer['pt_mundial']; ?></li>
                                  </ul>
                                </section>

                                <section class="cont">
                                  <ul class="list-unstyled user_data">
                                    <li>Carteira</li>
                                    <li>P.D:<?php echo $fichaPer['pd']; ?></li>
                                    <li>Insignias:<?php echo $fichaPer['insig']; ?></li>
                                  </ul>
                                </section>

                              </article>
                              
                              <div class="contatos">
                                <h2>Contatos:</h2>
                                <p><?php echo $fichaPer['contatos']?></p>
                              </div>

                               

                              <div  class="classe">
                                <div class="ln_solid"></div>
                                <h3><strong><?php echo ucwords($fichaClas['nomeclas'])?></strong></h3> 

                                <ul>
                                  <li><strong>Efeito:</strong> <?php echo ucfirst($fichaClas['efeito'])?></li>

                                  <li><strong>Bonus:</strong> <?php echo ucfirst($fichaClas['bonus'])?></li>

                                  <li><strong>Afinidade:</strong> <?php echo ucfirst($fichaClas['afinidade'])?></li>

                                  <li><strong>Poder de Torcida: </strong><?php echo ucfirst($fichaClas['ptorcida'])?></li>

                                  <li><strong>Evolução:</strong> <?php echo ucfirst($fichaClas['evo'])?></li>
                                </ul>
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
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
include_once("layout/footer.php");
?>