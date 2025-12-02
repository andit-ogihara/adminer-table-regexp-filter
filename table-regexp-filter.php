<?php

class AdminerTableRegexpFilter {
    function tablesPrint(array $tables): void {
        $script = '<script '.Adminer\nonce().">";
        $script .= "
document.addEventListener('DOMContentLoaded', function() {
  const ul = document.querySelector('#tables');
  if (!ul) return;

  const li = document.createElement('li');

  const input = document.createElement('input');
  input.id = 'table_filter';
  input.size = 25;
  input.placeholder = 'Regexp Filter... (ex. \'^prefix_\')';
  li.appendChild(input);

  const blank = document.createElement('text');
  blank.innerText = ' ';
  li.appendChild(blank);

  const clear = document.createElement('button');
  clear.id = 'filter_clear';
  clear.innerText = 'clear';
  li.appendChild(clear);

  ul.prepend(li);

  var ime_flg = false;
  input.addEventListener('keyup', function(e) {
    if (ime_flg) return;
    sessionStorage.setItem('table-filter', input.value);
    try {
      const regexp = new RegExp(input.value);
      document.querySelectorAll('#tables a.structure, #tables a.view').forEach((a) => {
        const li = a.closest('li')
        let display = 'list-item';
        if (!regexp.test(a.innerText)) {
          display = 'none';
        }
        li.style.display = display;
      });
    } catch (e) {
      return;
    }
  });

  clear.addEventListener('click', function(e) {
    input.value = '';
    input.dispatchEvent(new Event('keyup'));
  });

  input.value = sessionStorage.getItem('table-filter');
  input.dispatchEvent(new Event('keyup'));

  addEventListener('compositionstart', (event) => {
    ime_flg = true;
  });

  addEventListener('compositionend', (event) => {
    ime_flg = false;
  });

});
";
        $script .= '</script>';
        echo $script;
    }
}
