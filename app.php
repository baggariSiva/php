<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Site Metas -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <title>Elestio PHP example</title>
    <meta name="description" content="" />



    <link rel="stylesheet" href="css/style.css" />
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- Main content -->
    <header class="app-header">
        <img src="images/elestio-logo.svg" alt="logo" />
    </header>



    <div class="app-body">
        <div class="app-heading" style="margin-bottom: 40px;">
            <h1>Welcome to Elestio - PHP</h1>
            <h4>Deploy your apps quickly with the easiest CI/CD system</h2>
        </div>

        <?php

        function getIPAddress()
        {

            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            //whether ip is from the remote address  
            else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }





        $nip = getIPAddress();
        $ip_val = curl_init("https://ipwhois.app/json/");
        curl_setopt($ip_val, CURLOPT_RETURNTRANSFER, true);
        $json_value = curl_exec($ip_val);
        curl_close($ip_val);
        $ip_result = json_decode($json_value, true);
        ?>

        <p class="app-info-block">
            This Host <strong class="subVal" id="host"><?php echo $ip_result['ip']; ?></strong>
        </p>

        <p class="app-info-block">
            Your IP <strong class="subVal" id="yourIP"><?php echo $nip; ?></strong>
        </p>

         <p class="app-info-block">
            Your Location <strong class="subVal" id="location"><?php echo $ip_result['country_code']; ?> , <?php echo $ip_result['city']; ?></strong>
        </p>

        <p class="app-info-block">
            Latency to server <strong class="subVal" id="latency">? ms</strong>
        </p>



        <div class="app-deploy">
            <a href="https://dash.elest.io/deploy?source=cicd&social=Github&url=https://github.com/elestio-examples/static" class="btn mb-10-m btn-try">Deploy on Elestio
            </a>
        </div>
    </div>

    <!-- BG Anim -->
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>



    <!-- End Main content -->
    <!-- ALL JS FILES -->
</body>
<script>
    function getLatency() {
        var started = new Date().getTime();
        var url = "/elestio/index.php/data?t=" + (+new Date());
        fetch(url)
            .then(function(response) {
                var ended = new Date().getTime();
                var milliseconds = ended - started;
                document.getElementById("latency").innerHTML = milliseconds + " ms";
            }).catch(function(error) {
                document.getElementById("latency").innerHTML = "? ms";
            });

    }
    var timerLatency = window.setInterval(getLatency, 1000);
</script>
