<!--
<div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hp<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" name="hp" id="last-name" required="required" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">ATK<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" name="atk" id="last-name" required="required" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Defessa<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" name="def" id="last-name" required="required" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Esp.atk<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" name="satk" id="last-name" required="required" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Esp.def<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" name="sdef" id="last-name" required="required" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Speed<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" name="speed" id="last-name" required="required" class="form-control">
        </div>
    </div>

    <div class="item form-group">
        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Deslocamento<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 ">
            <input type="number" name="desloc" id="last-name" required="required" class="form-control">
        </div>
    </div>
-->



<img src="https://pokeres.bastionbot.org/images/pokemon/lucario.png" alt="">
<?php

$api_link = "https://pokeapi.co/api/v2/nature/lonely";
$response = file_get_contents($api_link);
$dados_nature = json_decode($response, true);

$nature_name= $dados_nature['name'];
$increased_stat = $dados_nature["increased_stat"]["name"];
$decreased_stat = $dados_nature["decreased_stat"]["name"];

echo 'nome-------------> '.$nature_name.'// ';
echo 'statos almentado-------------> '.$increased_stat.'// ';
echo 'status nerfado-------------> '.$decreased_stat;

// calculo da nature Naughty/safadinho
/*if($increased_stat == 'attack'){
    $atk= $pokemon_data['stats'][4]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'special-defense'){
    $sdef = $pokemon_data['stats'][1]['base_stat'] - (2 *$lv-1);
}*/

// calculo da nature lonely/solitario
/*if($increased_stat == 'attack'){
    $atk= $pokemon_data['stats'][4]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'defense'){
    $def = $pokemon_data['stats'][3]['base_stat'] - (2 *$lv-1);
}*/

// calculo da nature brave/valente
/*if($increased_stat == 'attack'){
    $atk= $pokemon_data['stats'][4]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'speed'){
    $speed = $pokemon_data['stats'][0]['base_stat'] - (2 *$lv-1);
}*/

// calculo da nature adamant
/*if($increased_stat == 'attack'){
    $atk= $pokemon_data['stats'][4]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'special-attack'){
    $stak = $pokemon_data['stats'][2]['base_stat'] - (2 *$lv-1);
}*/

// calculo da nature bold
/*if($increased_stat == 'defense'){
    $def= $pokemon_data['stats'][3]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'attack'){
    $atk = $pokemon_data['stats'][4]['base_stat'] - (2 *$lv-1);
}*/

// calculo da nature relaxed/relaxado
/*if($increased_stat == 'defense'){
    $def= $pokemon_data['stats'][3]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'speed'){
    $speed = $pokemon_data['stats'][0]['base_stat'] - (2 *$lv-1);
}*/

// calculo da nature impish
/*if($increased_stat == 'defense'){
    $def= $pokemon_data['stats'][3]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'special-attack'){
    $satk = $pokemon_data['stats'][2]['base_stat'] - (2 *$lv-1);
}*/

// calculo da nature lax
/*if($increased_stat == 'defense'){
    $def= $pokemon_data['stats'][3]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'special-defense'){
    $satk = $pokemon_data['stats'][1]['base_stat'] - (2 *$lv-1);
}*/

// calculo da nature timid/timido
/*if($increased_stat == 'speed'){
    $speed= $pokemon_data['stats'][0]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'attack'){
    $atk = $pokemon_data['stats'][4]['base_stat'] - (1*$lv-1);
}*/

// calculo da nature hasty/apresado
/*if($increased_stat == 'speed'){
    $speed= $pokemon_data['stats'][0]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'defense'){
    $def = $pokemon_data['stats'][3]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature jolly/
/*if($increased_stat == 'speed'){
    $speed= $pokemon_data['stats'][0]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'special-attack'){
    $satk = $pokemon_data['stats'][2]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature naive/
/*if($increased_stat == 'speed'){
    $speed= $pokemon_data['stats'][0]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'special-defense'){
    $sdef = $pokemon_data['stats'][1]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature modest/modesto
/*if($increased_stat == 'special-attack'){
    $satk= $pokemon_data['stats'][2]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'attack'){
    $atk = $pokemon_data['stats'][1]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature mild/
/*if($increased_stat == 'special-attack'){
    $satk= $pokemon_data['stats'][2]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'defense'){
    $def = $pokemon_data['stats'][3]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature quiet/
/*if($increased_stat == 'special-attack'){
    $satk= $pokemon_data['stats'][2]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'speed'){
    $speed = $pokemon_data['stats'][0]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature rash/
/*if($increased_stat == 'special-attack'){
    $satk= $pokemon_data['stats'][2]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'special-defense'){
    $sdef = $pokemon_data['stats'][1]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature calm/
/*if($increased_stat == 'special-defense'){
    $sdef= $pokemon_data['stats'][1]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'attack'){
    $atk = $pokemon_data['stats'][4]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature gentle/
/*if($increased_stat == 'special-defense'){
    $sdef= $pokemon_data['stats'][1]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'defense'){
    $def = $pokemon_data['stats'][3]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature sassy/
/*if($increased_stat == 'special-defense'){
    $sdef= $pokemon_data['stats'][1]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'speed'){
    $speed = $pokemon_data['stats'][0]['base_stat'] - (1 *$lv-1);
}*/

// calculo da nature careful/
/*if($increased_stat == 'special-defense'){
    $sdef= $pokemon_data['stats'][1]['base_stat']+(2 *$lv-1);
}if($decreased_stat == 'special-attack'){
    $satk = $pokemon_data['stats'][2]['base_stat'] - (1 *$lv-1);
}*/
?>