<?php foreach ($data as $val) {
    switch ($val['divisi']) {
        case 'Marketing Sobad':
            $background_img = 'bg-marketing';
            break;
        case 'PPIC':
            $background_img = 'bg-ppic';
            break;
        case 'Engineer':
            $background_img = 'bg-enginer';
            break;
        case 'IT':
            $background_img = 'bg-it';
            break;
        case 'Marketing KMI':
            $background_img = 'bg-marketing';
            break;
        case 'APD':
            $background_img = 'bg-apd';
            break;
        case 'Direktur':
            $background_img = 'bg-direktur';
            break;
        case 'HRD & GA':
            $background_img = 'bg-hrd';
            break;
        case 'MR':
            $background_img = 'bg-mrp';
            break;
        case 'Produksi':
            $background_img = 'bg-produksi';
            break;
    }

?>
    <div class="list-card scroll">
        <div class="row m-0 h-100 flex align-item-center">
            <div class="col-xs-1">
                <div class="line-vertical-<?= $val['priority'] ?>"></div>
            </div>
            <div class="col-xs-6 p-0">
                <?= $val['title'] ?> <br>
                <?php foreach ($val['hastag'] as $key) { ?>
                    <span class="hastag-state"><?= $key ?></span>
                <?php } ?>
                <br>
                <div class="line-progress mt-sm">
                    <div class="progress-line-<?= $val['proggress'] ?>"></div>
                </div>
                <span><?= $val['proggress'] ?>%</span>
            </div>
            <div class=" col-xs-2 p-0 text-right">
                <?= $val['date'] ?>
            </div>
            <div class="col-xs-1 p-0 text-center">
                <div class="line-vertical"></div>
            </div>
            <div class="col-xs-1 p-0">
                <div class="avatar <?= $background_img ?> m-auto">
                    <img width="100%" src="https://s.soloabadi.com/system-absen/asset/img/user/<?= $val['image'] ?>" alt="">
                </div>
            </div>
            <div class="col-xs-1 job-state">
                <div class="circle-state bg-<?= $val['status'] ?>"></div>
            </div>
        </div>
    </div>
<?php } ?>