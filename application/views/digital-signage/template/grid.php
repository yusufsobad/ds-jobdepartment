<div class="container-fluid">
    <div class="row">
        <?php foreach ($data as $key => $val) {
            $this->load->view('digital-signage/template/create-grid', $val);
        } ?>
    </div>
</div>