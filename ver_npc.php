<?php
include_once("layout/head.php");
$id_per = $_SESSION['id'];

if(isset($_POST['nome_item']) != '' ){
    $id = $_SESSION['id'];
    $nome = $_POST['nome_item'];
    $qnt = $_POST['qnt'];
    $pesso = $_POST['pesso'];

    $sql ="INSERT INTO mochila (id_per,peso_usado,nome_item,qnt_item) value ($id,'$pesso','$nome',$qnt)";
    $r_sql = mysqli_query($_SESSION['conexao'],$sql);
  }
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
               
              </div>
            </div>

            <div class="clearfix"></div>
            <?php
            if(isset($_GET['up']) == 'user'){

              $sql="SELECT qnt_item From mochila WHERE id_item = ".$_GET['id'];
              $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
              $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);
            
              if($resp_sql){
                $menus = $linha['qnt_item'] + 1;
                
            
                $menos_sql="UPDATE mochila SET qnt_item = $menus WHERE id_item = ".$_GET['id'];
                $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);
            
                
              }else{
                echo'<div class="alert alert-warning alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Erro !!.
                </div>';
              }
            }
            if(isset($_GET['del']) == 'user'){
              $sql="SELECT qnt_item From mochila WHERE id_item = ".$_GET['id'];
              $resp_sql = mysqli_query($_SESSION['conexao'],$sql);
              $linha=mysqli_fetch_array($resp_sql,MYSQLI_ASSOC);

              if($resp_sql){
                $menus = $linha['qnt_item'] - 1;
 
                $menos_sql="UPDATE mochila SET qnt_item = $menus WHERE id_item = ".$_GET['id'];
                $resposta = mysqli_query($_SESSION['conexao'],$menos_sql);
                
              }else{
                echo'<div class="alert alert-warning alert-dismissible " role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Erro !!.
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
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Classe</th>
                          <th>Time</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $sql = "SELECT * from npc ";
                        $result = mysqli_query($_SESSION['conexao'],$sql);
                        while($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                          echo '
                          <tr>
                          <td>'.$linha['nome_npc'].'</td>
                          <td>'.$linha['classe_npc'].'</td>
                          <td>'.$linha['time_npc'].'</td>
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
        <!-- /page content -->

<?php
include_once("layout/footer.php");
?>