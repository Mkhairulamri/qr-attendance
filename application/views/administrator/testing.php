<!-- application/views/qr_reader.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Reader</title>
</head>
<body>
    <h1>QR Code Reader</h1>
    <video id="preview"></video>
    <script src="https://cdn.jsdelivr.net/npm/instascan@2"></script>
    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
            // Send the QR code data to the server
            fetch('<?php echo base_url("qrcontroller/processQrCode"); ?>/' + content)
                .then(response => response.text())
                .then(data => {
                    // Handle the response from the server
                    console.log(data);
                });
        });

        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
</body>
</html>
