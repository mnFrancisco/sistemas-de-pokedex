<?php
include_once("layout/head.php");
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
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
                    <?php
                        //A pagina começa aqui

                        if(isset($_POST['nome_npc']) !=''){

                            $nome_npc=$_POST['nome_npc'];
                            $classe_npc=$_POST['classe_npc'];
                            $time_npc=$_POST['time_npc'];

                            $sql="INSERT INTO npc(nome_npc,classe_npc,time_npc) VALUES ('$nome_npc','$classe_npc','$time_npc')";
                            $roda=mysqli_query($_SESSION['conexao'],$sql);

                            if($roda){
                                echo '<button type="button" class="btn btn-round btn-success">NPC Criado com Sucesso</button>';
                            }else{
                                echo '<button type="button" class="btn btn-round btn-danger">Erro</button>';
                            }
                        }

                      ?>
                        <form action="criar_npc.php" method="POST" id="demo-form2" enctype="multipart/form-data" class="form-horizontal form-label-left" >
                            <!--Começa Personagem-->
                            <h3>NPC</h3>
                              
                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nome<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" class="form-control " name="nome_npc" required="required">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Classe<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="first-name" class="form-control " name="classe_npc" required="required">
                              </div>
                            </div>

                            <div class="item form-group">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Time <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="last-name" name="time_npc" required="required" class="form-control">
                              </div>
                            </div>

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
        <!-- /page content -->

<?php
include_once("layout/footer.php");
?>