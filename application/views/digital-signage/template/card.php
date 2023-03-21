<div class="card  <?= isset($color) ? $color : '' ?>">
    <div class="card-head">
        <div class="row m-0 ">
            <div class="col-xs-8 title-card-head flex align-item-center mt-md">
                <?= isset($icon) ? $icon : '' ?>
                <h3 class="ml-md"><?= $title ?></h3>
            </div>
            <div class="col-xs-3 text-center mt-md ">
                <?= isset($date) ? $date : '' ?>
            </div>
            <div class="col-xs-1 relative">
                <div id="<?= $count_id ?>" class="absolute count-job"><?= isset($count) ? $count : '' ?></div>
            </div>
        </div>
    </div>
    <div id="<?= $id ?>" class="card-body list">
        <?php $this->load->view('digital-signage/template/' . $content, $data); ?>
    </div>
</div>