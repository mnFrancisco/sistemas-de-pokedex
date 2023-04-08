<?php
include_once("layout/head.php");

$con=mysqli_connect("localhost","root","","rpg");

if (mysqli_connect_errno()) {
  echo "Erro ao conectar ao banco: " . mysqli_connect_error();
  exit();
}else{
  
  if(isset($_GET['id'])){ // RECEBE DADOS VIA GET
    $normal=' ';
    $shyni=' ';
    $id = $_GET['id'];

    $sql= "SELECT * FROM poke where id_poke=$id";
    $r_sql=mysqli_query($con,$sql);
    $linha = mysqli_fetch_array($r_sql,MYSQLI_ASSOC);

    if($linha['shyni'] == 'shiny'){
      $shyni = 'checked';
    }elseif($linha['shyni']=='normal'){
      $normal= 'checked';
    }

    
    
    //tipo de captura
    $tcap_pokebola = '';
    $tcap_presente = '';
    $tcap_reconpensa = '';
    $tcap_ovo = '';
    $tcap_focil = '';
    if($linha['tcap'] == 'Pokebola'){
      $tcap_pokebola = 'selected';
    }elseif($linha['tcap'] == 'Presente'){
      $tcap_presente = 'selected';
    }elseif($linha['tcap'] == 'Recompensa'){
      $tcap_reconpensa = 'selected';
    }elseif($linha['tcap'] == 'Ovo'){
      $tcap_ovo = 'selected';
    }else{
      $tcap_focil = 'selected';
    }

  }else{ // ENVIA DADOS VIA POST
      $id = $_POST['id']; //OCULTO
      $nome = $_POST['nome'];
      $t_type = $_POST['t_type'];
      $hab = $_POST['hab'];
      $nature = $_POST['nature'];
      $lv = $_POST['lv'];
      $xp = $_POST['xp'];
      $hp = $_POST['hp'];
      $atk = $_POST['atk'];
      $satk = $_POST['satk'];
      $def = $_POST['def'];
      $sdef = $_POST['sdef'];
      $speed = $_POST['speed'];
      $ami = $_POST['ami'];
      $desloc = floor($speed/10);
      $moves = $_POST['moves'];
      $shyni = $_POST['shiny'];
      $tcap = $_POST['tcap'];

      $sql = "UPDATE poke SET nome='$nome',
      t_type='$t_type',
      hab = '$hab',
      nature = '$nature', 
      xp = $xp, 
      lv = $lv, 
      hp = $hp, 
      atk = $atk, 
      satk = $satk, 
      def = $def, 
      sdef = $sdef, 
      speed = $speed, 
      ami = $ami, 
      desloc = $desloc,
      moves = '$moves',
      shyni = '$shyni',
      tcap= '$tcap' WHERE id_poke = $id";
      
      $result = mysqli_query($con,$sql);
      
      if($result){
        $msg = 'Dados atualizados com sucesso!';
      }else{
        $msg = 'Erro ao atualizar o registro!';
      }


      $sql = "SELECT * from poke WHERE id_poke = $id";
      $result = mysqli_query($con,$sql);
      $linha = mysqli_fetch_array($result, MYSQLI_ASSOC);

      $normal=' ';
      $shyni=' ';
      if($linha['shyni'] == 'shiny'){
        $shyni = 'checked';
      }elseif($linha['shyni']=='normal'){
        $normal= 'checked';
      }

      //CARRO FAV
      $tcap_pokebola = '';
      $tcap_presente = '';
      $tcap_reconpensa = '';
      $tcap_ovo = '';
      $tcap_focil = '';
      if($linha['tcap'] == 'Pokebola'){
        $tcap_pokebola = 'selected';
      }elseif($linha['tcap'] == 'Presente'){
        $tcap_presente = 'selected';
      }elseif($linha['tcap'] == 'Recompensa'){
        $tcap_reconpensa = 'selected';
      }elseif($linha['tcap'] == 'Ovo'){
        $tcap_ovo = 'selected';
      }else{
        $tcap_focil = 'selected';
      }
    }
  
  }
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Editar</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  
                  <div class="x_content">
                  <div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<!--<h2>Form Design <small>different form elements</small></h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a class="dropdown-item" href="#">Settings 1</a>
												</li>
												<li><a class="dropdown-item" href="#">Settings 2</a>
												</li>
											</ul>
										</li>
										<li><a class="close-link"><i class="fa fa-close"></i></a>
										</li>
									</ul>
									<div class="clearfix"></div>
								</div>-->
								<div class="x_content">
									<br>

								<form action="editar_usuarios.php" method="post" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">

                  <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nome:<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" name="nome" value="<?php echo $linha['nome']; ?>" required="required" class="form-control parsley-error" data-parsley-id="5"><ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tera Type:<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="first-name" name="t_type" value="<?php echo $linha['t_type']; ?>" required="required" class="form-control parsley-error" data-parsley-id="5"><ul class="parsley-errors-list filled" id="parsley-id-5"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Habilit: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="hab" value="<?php echo $linha['hab']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Nature: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="nature" value="<?php echo $linha['nature']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Xp: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="xp" value="<?php echo $linha['xp']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Lv: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="lv" value="<?php echo $linha['lv']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hp: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="hp" value="<?php echo $linha['hp']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Atk: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="atk" value="<?php echo $linha['atk']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sp.atk: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="satk" value="<?php echo $linha['satk']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Def: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="def" value="<?php echo $linha['def']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Sp.def: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="sdef" value="<?php echo $linha['sdef']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Speed: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="speed" value="<?php echo $linha['speed']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <!--<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Deslocamento: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="desloc" value="<?php //echo $linha['desloc']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>-->

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Amizade: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="number" id="last-name" name="ami" value="<?php echo $linha['ami']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">moves: <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" id="last-name" name="moves" value="<?php echo $linha['moves']; ?>" required="required" class="form-control parsley-error" data-parsley-id="7"><ul class="parsley-errors-list filled" id="parsley-id-7"><li class="parsley-required">This value is required.</li></ul>
											</div>
										</div>

                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tipo de captura<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 ">
                          <select class="select2_group form-control" name="tcap">
                              <option value="Pokebola" <?php echo $tcap_pokebola;?>>Pokebola</option>
                              <option value="Recompensa" <?php echo $tcap_reconpensa;?>>Recompensa</option>
                              <option value="Presente" <?php echo $tcap_presente;?>>Presente</option>
                              <option value="Ovo" <?php echo $tcap_ovo;?>>Ovo</option>
                              <option value="Focil" <?php echo $tcap_focil;?>>Focil</option>
                          </select>
                      </div>
                    </div>
                    
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">shiny<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2">
                            <input type="radio" name="shiny" id="last-name"  class="form-control" value="shiny" <?php echo $shyni; ?>>
                        </div>
                    
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Normal<span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 ">
                            <input type="radio" name="shiny" id="last-name"  class="form-control" value="normal" <?php echo $normal; ?>>
                        </div>
                    </div>

										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<!--<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>-->
                        <input type="submit" value="Atualizar" class="btn btn-success">
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
  </div>
</div>
        <!-- /page content -->

<?php
include_once("layout/footer.php");
?>