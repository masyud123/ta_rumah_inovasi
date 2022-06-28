<div class="container-fluid bg-info" style="height: 100vh;">
    <div class="d-flex justify-content-center h-100 align-items-center">
        <div class="col-12 col-md-8 col-lg-5 mt-3 mb-4">
            <?= $this->session->flashdata('pesan_otp')?>
            <?= $this->session->flashdata('pesan_salah')?>
			<div class="card">
				<div class="card-header text-center">
                    <h1 class="h4 text-gray-900">Verifikasi Kode OTP</h1>
				</div>
				<div class="card-body">
                    <div class="p-3">
                        <h5 style="text-align: justify;">
                            Silahkan masukkan kode yang telah anda terima pada form di bawah ini. Jika belum mendapatkan kode silahkan klik tombol request kode
                        </h5>
                        <form id="form_kode" action="<?= base_url('Pendaftaran/verifikasi_kode/')?>" method="post" enctype="multipart/form-data">
                            <div align="center" class="mt-4">
                                <h4 class="tect-secondary mb-2"><strong id="countdown"></strong></h4>
                                <input type="text" name="kode_otp" class="form-control col-6 text-center mt-3" placeholder="Masukkan kode disini!" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>
                            <div class="mt-5 d-flex justify-content-around">
                                <button id="request" type="button" class="btn btn-success btn-sm">Request Kode</button>
                                <button id="simpan" disabled type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?php echo base_url('Login') ?>">Sudah Punya Akun ? Silahkan Login</a>
                        </div>
                    </div>
				</div>
			</div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        <?php 
            foreach($this->cart->contents() as $items):
                $waktu_create = $items['waktu_create'];
            endforeach;
            $time_now   = date('H:i:s');

            $time         = [$waktu_create, '00:02:00'];
            $sum          = strtotime('00:00:00');
            $totaltime    = 0;
            
            foreach( $time as $element ) {
                $timeinsec = strtotime($element) - $sum;
                $totaltime = $totaltime + $timeinsec;
            }

            $h = intval($totaltime / 3600);
            $totaltime = $totaltime - ($h * 3600);
            $m = intval($totaltime / 60);
            $s = $totaltime - ($m * 60);

            if(strtotime("$h:$m:$s") > strtotime($time_now)):?>
                $('#request').attr('disabled', true);
                $('#simpan').removeAttr('disabled',true);

                // Set the date we're counting down to
                <?php foreach($this->cart->contents() as $items):?>
                var countDownDate = new Date("<?= date('M d, Y ').("$h:$m:$s")?>").getTime();
                <?php endforeach;?>

                    // Update the count down every 1 second
                    var x = setInterval(function() {
                        // Get today's date and time
                        var now = new Date().getTime();
                            
                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;
                            
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        var seconds2 = seconds < 10 ? '0' + seconds : seconds;
                            
                        // Output the result in an element with id="demo"
                        document.getElementById("countdown").innerHTML = minutes+" : "+seconds2;
                            
                        // If the count down is over, write some text 
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("countdown").innerHTML = "0 : 00";
                            $('#request').removeAttr('disabled',true);
                            $('#simpan').attr('disabled', true);
                        }
                    },1000);
            <?php endif;?>

        // fungsi untuk request kode
        $('#request').click(function(){
            $.ajax({
                url: "<?php echo base_url('pendaftaran/create_kode') ?>", 
                success: function(data) {
                    $('#request').attr('disabled', true);
                    $('#simpan').removeAttr('disabled',true);

                    var countDownDate = new Date("<?= date('M d, Y ')?>"+data).getTime();

                    // Update the count down every 1 second
                    var x = setInterval(function() { 
                        // Get today's date and time
                        var now = new Date().getTime();
                            
                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;
                            
                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        var seconds2 = seconds < 10 ? '0' + seconds : seconds;
                            
                        // Output the result in an element with id="demo"
                        document.getElementById("countdown").innerHTML = minutes+" : "+seconds2;
                            
                        // If the count down is over, write some text 
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("countdown").innerHTML = "0 : 00";
                            $('#request').removeAttr('disabled',true);
                            $('#simpan').attr('disabled', true);  
                        }
                    },1000);
                }
            });
        });
    });
</script>