<div class="circle-chart ">
    <div class="circle-chart-blue">
        <h2><?= $data[0]['count'] ?></h2>
    </div>
    <div class="circle-chart-purple">
        <h2><?= $data[1]['count'] ?></h2>
    </div>
    <div class="circle-chart-yellow">
        <h2><?= $data[2]['count'] ?></h2>
    </div>
</div>
<div class="detail-chart">
    <div class="row">
        <div class="col-xs-4 p-0">
            <div class="flex align-item-center justify-end">
                <div class="mini-cube bg-blue"></div>
                <div class="label-chart deep-grey ml-sm"><?= $data[0]['divisi'] ?></div>
            </div>
        </div>
        <div class="col-xs-4 p-0">
            <div class="flex align-item-center justify-center">
                <div class="mini-cube bg-purple"></div>
                <div class="label-chart deep-grey ml-sm"><?= $data[1]['divisi'] ?></div>
            </div>
        </div>
        <div class="col-xs-4 p-0">
            <div class="flex align-item-center justify-start">
                <div class="mini-cube bg-yellow"></div>
                <div class="label-chart deep-grey ml-sm"><?= $data[2]['divisi'] ?></div>
            </div>
        </div>
    </div>
</div>