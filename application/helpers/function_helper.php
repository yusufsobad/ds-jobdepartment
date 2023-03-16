<?php
function indo_day($day)
{
    $hari = array(
        1 =>   'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu',
    );
    // $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return  $hari[(int)$day];
}

function short_month($month)
{
    $bulan = array(
        1 =>   'Jan',
        'Feb',
        'Mar',
        'April',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sept',
        'Oct',
        'Nov',
        'Dec'
    );
    // $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return  $bulan[(int)$month];
}

function ajax($url = '', $type = '', $data = [], $respon = '')
{
?>
    <script>
        var url = '<?= $url ?>';
        var type = '<?= $type ?>';
        var data = '<?= $data ?>'
        var respon = '<?= $respon ?>'
        var data = JSON.parse(data)
        timer(url, type, data, respon);

        function timer(url, type, data, respon) {
            setInterval(function() {
                getData(url, type, data, respon)
            }, 50000);
        } // panggil setiap 1 detik


        function getData(url, type, args, respon) {
            $.ajax({
                url: url,
                type: type,
                data: {
                    args: args,
                },
            }).done(function(data) {
                $('' + respon + '').html(data);
            });
        };
    </script>
<?php
}