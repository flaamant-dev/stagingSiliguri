<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Siliguri.City</title>
    <meta name="description" content="A one stop solution for Siliguri City">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="this is siliguri.city">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="565897567167-r7n21uqr0tmt1irv6l441v6cvtai008p.apps.googleusercontent.com">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/images/fabicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/images/fabicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/images/fabicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url(); ?>assets/images/fabicon/site.webmanifest">

    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
	<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cs-skin-elastic.css">    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/search.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/chosen/chosen.min.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    
    <?php if ($this->uri->segment(2) == "becomeSeller" || $this->uri->segment(2) == "doctor_enroll") { ?>
        <style>
                
                fieldset{
                    margin: 0;
                    padding: 0;
                    border: none;
                }

                /* GRID */

                .twelve { width: 100%; }
                .eleven { width: 91.53%; }
                .ten { width: 83.06%; }
                .nine { width: 74.6%; }
                .eight { width: 66.13%; }
                .seven { width: 57.66%; }
                .six { width: 49.2%; }
                .five { width: 40.73%; }
                .four { width: 32.26%; }
                .three { width: 23.8%; }
                .two { width: 15.33%; }
                .one { width: 6.866%; }

                /* COLUMNS */

                .col {
                    display: block;
                    float:left;
                    margin: 0 0 0 1.6%;
                }

                .col:first-of-type {
                    margin-left: 0;
                }

                .container{
                    width: 100%;
                    max-width: 700px;
                    margin: 0 auto;
                    position: relative;
                }

                /* CLEARFIX */

                .cf:before,
                .cf:after {
                    content: " ";
                    display: table;
                }

                .cf:after {
                    clear: both;
                }

                .cf {
                    *zoom: 1;
                }

                .wrapper{
                    width: 100%;
                    margin: 30px 0;
                }

                /* STEPS */

                .steps{
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                    background-color: #fff;
                    text-align: center;
                }


                .steps li{
                    display: inline-block;
                    margin: 20px;
                    color: #ccc;
                    padding-bottom: 5px;
                }

                .steps li.is-active{
                    border-bottom: 1px solid #3498db;
                    color: #3498db;
                }

                /* FORM */
                .form-wrapper{
                    position: relative;
                    height: 320px;
                }
                
                .form-wrapper .control-label{
                    color:#1b5280;
                }

                .form-wrapper .section{
                    padding: 0px 20px 30px 20px;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    background-color: #fff;
                    opacity: 0;
                    -webkit-transform: scale(1, 0);
                    -ms-transform: scale(1, 0);
                    -o-transform: scale(1, 0);
                    transform: scale(1, 0);
                    -webkit-transform-origin: top center;
                    -moz-transform-origin: top center;
                    -ms-transform-origin: top center;
                    -o-transform-origin: top center;
                    transform-origin: top center;
                    -webkit-transition: all 0.5s ease-in-out;
                    -o-transition: all 0.5s ease-in-out;
                    transition: all 0.5s ease-in-out;
                    position: absolute;
                    width: 100%;
                }

                .form-wrapper .section h4{
                    text-align: center;
                    margin-bottom: 20px;
                }

                .form-wrapper .section.is-active{
                    opacity: 1;
                    -webkit-transform: scale(1, 1);
                    -ms-transform: scale(1, 1);
                    -o-transform: scale(1, 1);
                    transform: scale(1, 1);
                }

                .form-wrapper .next {
                    background-color: #019ecb;
                    display: inline-block;
                    padding: 8px 30px;
                    color: #fff;
                    cursor: pointer;
                    font-size: 14px !important;
                    position: absolute;
                    right: 20px;
                    bottom: 20px;
                }

                .form-wrapper .previous {
                    background-color: #019ecb;
                    display: inline-block;
                    padding: 8px 30px;
                    color: #fff;
                    cursor: pointer;
                    font-size: 14px !important;
                    position: absolute;
                    left: 20px;
                    bottom: 20px;
                }

                .form-wrapper .submit{
                    background-color: #019ecb;
                    display: inline-block;
                    padding: 8px 30px;
                    color: #fff;
                    cursor: pointer;
                    font-size: 14px !important;
                    position: absolute;
                    right: 20px;
                    bottom: 20px;
                }

                .form-wrapper .submit:disabled {
                    background-color: #9ecddb;
                    display: inline-block;
                    padding: 8px 30px;
                    color: #fff;
                    cursor: pointer;
                    font-size: 14px !important;
                    position: absolute;
                    right: 20px;
                    bottom: 20px;
                }

                .form-wrapper .submit{
                    border: none;
                    outline: none;
                    -webkit-box-sizing: content-box;
                    -moz-box-sizing: content-box;
                    box-sizing: content-box;
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    appearance: none;
                }

        </style>
    <?php } ?>


    <style>
        #weatherWidget .currentDesc {
            color: #ffffff !important;
        }

        .traffic-chart {
            min-height: 335px;
        }

        #flotPie1 {
            height: 150px;
        }

        #flotPie1 td {
            padding: 3px;
        }

        #flotPie1 table {
            top: 20px !important;
            right: -10px !important;
        }

        .chart-container {
            display: table;
            min-width: 270px;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        #flotLine5 {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }

        #cellPaiChart {
            height: 160px;
        }
    </style>
</head>

<?php $this->load->view('autologout'); ?>