<?php
include_once("layout/head.php");

$user=buscausuario();
$id_per = $_SESSION['id'];

$fichaPer=fichaPer();
$fichaClas=fichaClas();
$fichaSkill=fichaSkill();

//personagem
if(isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['size'] > 0) {
  $path = "images/perfil/";

  $nome = $_FILES['uploaded_file']['name'];

  $extensao = strrchr($nome,'.');

  $novonome = md5(microtime()) . $extensao;

  $path = $path.$novonome;

  $tam_img = $_FILES['uploaded_file']['size'];

  $sql_foto = "UPDATE tbl_fotos SET nome_foto='$nome', nomemd5_foto='$novonome', tamanho_foto='$tam_img' WHERE id_per=$id_per";
  $roda_query = mysqli_query($con, $sql_foto);

  if($roda_query && move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
      echo "O arquivo ". basename($nome) . " foi enviado com sucesso!";
  } else {
      echo "Houve um erro ao enviar seu arquivo!";
  }
}


if(isset($_POST['idade']) != ''){  
	$nome = $user['nome'];
	$idade = $_POST['idade'];
	$id_treiner = $_POST['id_trei'];
	$regiao = $_POST['regiao'];
	$cidade = $_POST['cidade'];
	$insig = $_POST['insig'];
	$mundial = $_POST['mundial'];
  $pt_mundial = $_POST['pt_mundial'];
  $pd = $_POST['pd'];
  $contatos = $_POST['contatos'];

  $sqlM = "UPDATE persona SET nomeper='$nome',
  idade='$idade',
  id_trei='$id_treiner',
  regiao='$regiao',
  cidade='$cidade',
  insig='$insig',
  mundial='$mundial',
  pt_mundial='$pt_mundial',
  pd='$pd',
  contatos='$contatos' where id_per=$id_per;";
  $roda_sql=mysqli_query($_SESSION['conexao'],$sqlM);

  //classe
  if(isset($_POST['nomeclas']) != ''){
    $nome = $_POST['nomeclas'];
    $efeito = $_POST['efeito'];
    $bonus = $_POST['bonus'];
    $afinidade = $_POST['afinidade'];
    $ptorcida = $_POST['ptorcida'];
    $evo = $_POST['evo']; 

    $sqlH = "UPDATE classe SET nomeclas='$nome',
    efeito='$efeito',
    bonus='$bonus',
    afinidade='$afinidade',
    ptorcida='$ptorcida',
    evo='$evo' where id_per=$id_per;";

    $roda_sql=mysqli_query($_SESSION['conexao'],$sqlH);
    }

}


?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>
            <?php
              
            ?>
            
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Criar Ficha</h2>
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
                      <?php
                        //A pagina começa aqui
                        
                      ?>
                      <div class="x_panel">
                        
                        <div class="x_content" style="display: block;">
                          <br>
                          <form action="editar_per.php" method="POST" id="demo-form2" enctype="multipart/form-data" class="form-horizontal form-label-left" >
                          <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <!--Começa Personagem-->
                            <h2>Personagem</h2>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Imagem<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="file" id="first-name" name="uploaded_file">
                              </div>
                            </div>
                            
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nome do personagem<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" class="form-control " name="nomeper"  value="<?php echo $fichaPer['nomeper']; ?>">
                              </div>
                            </div>


                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Região <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="regiao" required="required" class="form-control" value="<?php echo $fichaPer['regiao']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Cidade <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="cidade" required="required" class="form-control" value="<?php echo $fichaPer['cidade']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Idade <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="idade" required="required" class="form-control" value="<?php echo $fichaPer['idade']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">ID. de Trinador</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="id_trei" value="<?php echo $fichaPer['id_trei']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Insignias</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="insig" value="<?php echo $fichaPer['insig']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ranking Mundial</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="mundial" value="<?php echo $fichaPer['mundial']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Pontuação  Mundial</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="pt_mundial" value="<?php echo $fichaPer['pt_mundial']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">P.d</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="pd" value="<?php echo $fichaPer['pd']; ?>">
                              </div>
                            </div>

                            <!--Começa amigos-->
                              <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Amigos/Contatos</label>
                                <div class="col-md-6 col-sm-6 ">
                                  <input id="middle-name" class="form-control" type="text" name="contatos" value="<?php echo $fichaPer['contatos']; ?>">
                                </div>
                              </div>
                              <!--Termina amigos-->

                            <!-- Termina Personagem -->

                            <div class="ln_solid"></div>

                            <!--Comaça clase-->
                            <h2>Classe</h2>
                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Nome da classe <span class="required">*</span></label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="nomeclas" value="<?php echo $fichaClas['nomeclas']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Efeito</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="efeito" value="<?php echo $fichaClas['efeito']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Afinidade</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="afinidade" value="<?php echo $fichaClas['afinidade']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Bonus</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="bonus" value="<?php echo $fichaClas['bonus']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Poder de torcida</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="ptorcida" value="<?php echo $fichaClas['ptorcida']; ?>">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Evolução</label>
                              <div class="col-md-6 col-sm-6 ">
                                <input id="middle-name" class="form-control" type="text" name="evo" value="<?php echo $fichaClas['evo']; ?>">
                              </div>
                            </div>
                            <!--Termina clase-->

                            <div class="ln_solid"></div>

                            <div class="item form-group">

                              <div class="col-md-6 col-sm-6 offset-md-3">
                                
                                <button type="submit" class="btn btn-success">Salvar</button>
                              </div>
                            </div>

                          </form>
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