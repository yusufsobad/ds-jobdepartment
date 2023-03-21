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

function image($url_image = '', $divisi = '')
{
    switch ($divisi) {
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
    $image_one = '<div class="avatar ' . $background_img . ' ml-lg">
						<img width="40px" src="https://s.soloabadi.com/system-absen/asset/img/user/' . $url_image . '" alt="">
					</div>
				';

    return $image_one;
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
            }, 120000);
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
