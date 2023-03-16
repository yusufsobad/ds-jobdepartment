<?php
$day = date('N');
$day = indo_day($day);
$date = date('d');
$month = date('m');
$month = short_month($month);
$year = date('Y');

?>
<div class="card-calendar mt-4">
    <div class="col-xs-12">
        <div class="row inner-card-calendar">
            <div class="col-xs-5">
                <div class="box-date text-center">
                    <h5 class="purple"><?= $day ?></h5>
                    <div class="date"><?= $date ?></div>
                    <h5 class="purple"><?= $month . ' ' . $year ?></h5>
                </div>
            </div>
            <div class="col-xs-8 text-center light">
                <span class="time" id="jam"></span>
                <span class="time" id="sparator">:</span>
                <span class="time" id="menit"></span>
            </div>
        </div>
    </div>
</div>