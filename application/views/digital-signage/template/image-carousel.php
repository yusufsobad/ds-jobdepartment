<div class="mt-md carousel owl-carousel">
    <?php foreach ($data as $value) {
        if ($value['status'] == 1) {
            $color = 'bg-light-purple';
        } else {
            $color = 'bg-grey';
        }
    ?>
        <div class="col-xs-2 slide">
            <div class="image-squad <?= $color ?>">
                <img width="90%" src="https://s.soloabadi.com/system-absen/asset/img/user/<?= $value['url_image'] ?>" alt="">
            </div>
        </div>
    <?php } ?>
</div>