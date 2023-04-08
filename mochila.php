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
                  
                  <h2>Registar itens na mochila</h2>
                    <form action="mochila.php" method="POST">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome_item" placeholder="Nome do Item">
                            
                            <input type="text" class="form-control" name="qnt" placeholder="Quantidade">
                            <input type="text" class="form-control" name="pesso" placeholder="Pesso">

                            <span class="input-group-btn">
                            <input class="btn btn-secondary" type="submit"></input>
                            </span>
                        </div>
                    </form>
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
                        $sql = "SELECT * from mochila where qnt_item !=0 and id_per=$id_per";
                        $result = mysqli_query($_SESSION['conexao'],$sql);
                        while($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                          echo '
                          <tr>
                          <td>'.$linha['qnt_item']*$linha['peso_usado'].'</td>
                          <td>'.$linha['nome_item'].'</td>
                          <td>'.$linha['qnt_item'].'</td>
                          <td>'.$linha['peso_usado'].'</td>
                          <td>
                          <a class="link_mais_menos mais" href="mochila.php?'.md5('hfbashfbashdgsahdbajsd').'&up=user&id='.$linha['id_item'].'"><i class="fa fa-arrow-up"></i></a>
                          <a class="link_mais_menos menos" href="mochila.php?'.md5('hfbashfbashdgsahdbajsd').'&del=user&id='.$linha['id_item'].'"><i class="fa fa-minus"></i></a>
                          </td>
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