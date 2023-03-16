<!-- Vendor JS -->
<script src="assets/Sasi-Dashboard/vendor/jquery/jquery.min.js"></script>
<script src="assets/Sasi-Dashboard/vendor/owl-carousel/js/owl.carousel.min.js"></script>


<!-- Bootstrap - 3 JS -->
<script src="assets/bootstrap-3/js/bootstrap.min.js"></script>

<!-- SASI UI -->
<script src="assets/Sasi-Dashboard/js/sasi-ui.js"></script>
<script src="assets/Sasi-Dashboard/js/owl-config.js"></script>
<script src="assets/Sasi-Dashboard/js/vertical-scroll.js"></script>
</body>

</html>

<script>
    window.setTimeout("waktu()", 1000);

    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        // document.getElementById("detik").innerHTML = waktu.getSeconds();
    }

    function blink() {
        $('#sparator').fadeOut();
        $('#sparator').fadeIn();
    }

    setInterval(blink, 1000);
</script>