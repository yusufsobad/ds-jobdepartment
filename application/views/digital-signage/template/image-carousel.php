<div class="mt-md carousel owl-carousel">
    <?php foreach ($data as $value) { ?>
        <div class="col-xs-2 slide">
            <div class="image-squad bg-light-purple">
                <img width="90%" src="https://s.soloabadi.com/system-absen/asset/img/user/<?= $value['url_image'] ?>" alt="">
            </div>
        </div>
    <?php } ?>
</div>