
var btn = document.querySelector('.mostrar_esconder');
var conteiner = document.querySelector('.conteiner');

btn.addEventListener('click', function() {
    if (conteiner.style.display === 'block') {
        conteiner.style.display = 'none';
    } else {
        conteiner.style.display = 'block';
    }
});
var btn_PC = document.querySelector('.mostrar_esconder_pc');
var conteiner_PC = document.querySelector('.conteiner_pc');

btn_PC.addEventListener('click', function() {
    if (conteiner_PC.style.display === 'block') {
        conteiner_PC.style.display = 'none';
    } else {
        conteiner_PC.style.display = 'block';
    }
});
function toggleVisibility(id) {
    var elemento = document.getElementById(id);
    if (elemento.style.display === 'none') {
      elemento.style.display = 'block';
    } else {
      elemento.style.display = 'none';
    }
  }
  
