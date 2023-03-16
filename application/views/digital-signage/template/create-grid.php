<?php
$id = isset($id) ? $id : '';
$col = isset($col) ? $col : 12;
$class = isset($class) ? $class : '';

?>
<div id="<?= $id ?>" class="col-xs-<?= $col . ' ' . $class ?>">
    <?php
    $this->load->view('digital-signage/template/' . $content, $data);
    ?>
</div>