<?php
function createTitleBar($text = ""){
  echo '
  <div class="titleBar">
    <label>'.$text.'</label>
    <button class="close" onclick="closeWindow(this, true)" >X</button>
  </div>
  ';
}
?>
