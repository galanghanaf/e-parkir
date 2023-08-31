<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>QR Code</title>

    <script src="<?= base_url('/assets/datatables/js/jquery-3.5.1.js') ?>"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('/assets/bootstrap-5.2.3/css/bootstrap.min.css') ?>">
    <script src="<?= base_url('/assets/bootstrap-5.2.3/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Bootstrap -->

    <!-- Start FontAwesome -->
    <link rel="stylesheet" href="<?= base_url('/assets/fontawesome-v4/css/all.min.css') ?>">
    <!-- End FontAwesome -->
    <link rel="icon" href="<?= base_url() . "assets/icon.png" ?>" type="image/gif">

    <script src="<?= base_url('/assets/js/script.js') ?>"></script>
    <script src="<?= base_url('/assets/qrcode/qrcode.min.js') ?>"></script>

    <script src="<?= base_url('/assets/jpdf/html2canvas.js'); ?>"></script>
    <script src="<?= base_url('/assets/jpdf/jspdf.js'); ?>"></script>
    <script src="<?= base_url('/assets/jpdf/j-pdf.js'); ?>"></script>

    <style>
        .test {
            width: 15%;
        }

        .smaller {
            font-size: 11px;
        }

        div.absolute_nik {
            position: absolute;
            top: 50px;
            right: 800px;
            width: 100px;
            height: 100px;

        }

       
    </style>

</head>

<body>
    <center>
        <div class="j-pdf-wrap test">

            <div class="j-pdf-block">
                <div class="j-pdf-head ">
                    <!-- <small class="smaller">
                        <?= $querykendaraan->nik ?> || <?= $querykendaraan->nama ?> || <?= $querykendaraan->no_kendaraan ?>
                    </small> -->
                </div>
                <div class="j-pdf-body" id="canvas">
                    <div class="j-pdf-body__order">

                        <table>
                            <tr>
                                <td rowspan="4">
                                    <div class="j-pdf-body__order-in" id="qrcode">

                                        <script>
                                            function downloadURI(uri, name) {
                                                var link = document.createElement("a");
                                                link.download = name;
                                                link.href = uri;
                                                document.body.appendChild(link);
                                                link.click();
                                                document.body.removeChild(link);
                                                delete link;
                                            };

                                            window.onload = function() {
                                                console.log('onload');
                                                let qrcode = new QRCode("qrcode", {
                                                    text: "<?= $querykendaraan->no_kendaraan ?>",
                                                    content: "test",
                                                    width: 90,
                                                    height: 90,
                                                    colorDark: "#000000",
                                                    colorLight: "#ffffff",
                                                    correctLevel: QRCode.CorrectLevel.H
                                                });
                                                $('body').on('click', '.qrcode_download', function() {
                                                    let dataUrl = document.querySelector('#qrcode').querySelector('img').src;
                                                    downloadURI(dataUrl, 'qrcode_<?= $querykendaraan->nik ?>_<?= $querykendaraan->nama ?>_<?= $querykendaraan->no_kendaraan ?>.png');
                                                })

                                            };
                                        </script>
                                    </div>

                                </td>

                            </tr>
                            <tr>
                                <td><?= $querykendaraan->nik ?></td>
                            </tr>
                            <tr>
                                <td><?= $querykendaraan->nama ?></td>
                            </tr>
                            <tr>
                                <td><?= $querykendaraan->no_kendaraan ?></td>
                            </tr>
                        </table>



                    </div>
                </div>
            </div>
        </div>
        <div class="j-pdf-wrap-head mt-3 text-center">
            <!-- Example single danger button -->
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-qrcode"></i> Download QR Code
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item qrcode_download" href="#"><i class="fa fa-qrcode"></i> Download PNG</a></li>
                    <li><a class="dropdown-item j-pdf__btn pdf__screenshot" href="#"><i class="fa fa-camera"></i> Download Dengan Nama</a></li>
                    <li><a class="dropdown-item j-pdf__btn pdf__gen" href="#"><i class="fa fa-file-pdf"></i> Download PDF</a></li>
                    <li><a class="dropdown-item" href="#" onclick="printDiv('qrcode')" ><i class="fa fa-print"></i> Print QR Code</a></li>
                    <li><a class="dropdown-item" href="#" onclick="printDiv('canvas')" ><i class="fa fa-print"></i> Print QR Code Dengan Nama</a></li>
                </ul>
            </div>
        </div>

        <script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();
                txt.style.textAlign = "center";
                document.body.innerHTML = originalContents;
            }
        </script>


        <div>
            <a href="<?= base_url() . 'home/dataKendaraan'; ?>" class="btn btn-danger fw-bold mt-3"><i class="fa fa-share-square"></i> Kembali</a>
        </div>
    </center>

    <script>
        /*!
         * PDF print - jQuery Plugin
         * version: 1.0.0 (November 2022)
         * @requires jQuery
         * @requires jsPdf
         * @requires html2canvas
         *
         * Examples at / https://jobyaj.github.io/j-pdf/
         *
         * Developed By Joby AJ 
         *
         */

        // *****screenshot*****
        // element : element selector , default document.body
        //  $fileName : file name for save the screenshot , default sample.png

        var screenshotObj = {
            element: '.j-pdf-block',
            $fileName: 'qrcode-label_<?= $querykendaraan->nik ?>_<?= $querykendaraan->nama ?>_<?= $querykendaraan->no_kendaraan ?>.png'
        }


        // ********pdfDownload*****
        //  $fileName : file name for save the screenshot , default sample.pdf
        // element : element selector
        var pdfObj = {
            element: '.j-pdf-block',
            $fileName: 'qrcode-pdf_<?= $querykendaraan->nik ?>_<?= $querykendaraan->nama ?>_<?= $querykendaraan->no_kendaraan ?>'
        }

        $(function() {
            $('body').on('click', '.pdf__screenshot', function() {
                jpdf.screenshot(screenshotObj);
            }).on('click', '.pdf__gen', function() {
                jpdf.pdfDownload(pdfObj);
            });
        });
    </script>
</body>


</html>