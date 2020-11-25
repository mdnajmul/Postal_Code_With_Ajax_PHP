<?php

    include('db.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Ajax Country State City Dropdown.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>PHP Ajax GET Postal Code (Bangladesh) </h1>
        <form>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="country">Division</label>
                        <select class="form-control" id="division">
                            <option value="">Select Division</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Chattogram">Chattogram</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Sylhet">Sylhet</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="state">District</label>
                        <select class="form-control" id="district">
                            <option>Select District</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="city">Thana</label>
                        <select class="form-control" id="thana">
                            <option>Select Thana</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="city">SubOffice</label>
                        <select class="form-control" id="sub_office">
                            <option>Select SubOffice</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div id="divLoading"></div>
    <div id="postal_code" style="text-align:center"><span></span></div>
    <style>
        #divLoading {
            display: none;
        }

        #divLoading.show {
            display: block;
            position: fixed;
            z-index: 100;
            background-image: url('img/ajax-loader.gif');
            background-color: #666;
            opacity: 0.4;
            background-repeat: no-repeat;
            background-position: center;
            left: 0;
            bottom: 0;
            right: 0;
            top: 0;
        }

        #loadinggif.show {
            left: 50%;
            top: 50%;
            position: absolute;
            z-index: 101;
            width: 32px;
            height: 32px;
            margin-left: -16px;
            margin-top: -16px;
        }
    </style>
    
    
    <script>
        $(document).ready(function(){
            
            $('#division').change(function(){
                var div=$(this).val();
                if(div==''){
                  $('#district').html('<option value="">Select District</option>');
                  $('#thana').html('<option value="">Select Thana</option>'); 
                  $('#sub_office').html('<option value="">Select SubOffice</option>');
                  $('#postal_code').html('');
                }else{
                    $('#divLoading').addClass('show');
                    $('#district').html('<option value="">Select District</option>');
                    $('#thana').html('<option value="">Select Thana</option>'); 
                    $('#sub_office').html('<option value="">Select SubOffice</option>');
                    $('#postal_code').html('');
                    $.ajax({
                        url:'get_data.php',
                        type:'post',
                        data:'div='+div+'&type=district',
                        success:function(result){
                            $('#divLoading').removeClass('show');
                            $('#district').append(result);
                        }
                    });
                }
            });
            
            $('#district').change(function(){
                var dist=$(this).val();
                if(dist==''){
                  $('#thana').html('<option value="">Select Thana</option>'); 
                  $('#sub_office').html('<option value="">Select SubOffice</option>');
                  $('#postal_code').html('');
                }else{
                    $('#divLoading').addClass('show');
                    $('#thana').html('<option value="">Select Thana</option>'); 
                    $('#sub_office').html('<option value="">Select SubOffice</option>');
                    $('#postal_code').html('');
                    $.ajax({
                        url:'get_data.php',
                        type:'post',
                        data:'dist='+dist+'&type=thana',
                        success:function(result){
                            $('#divLoading').removeClass('show');
                            $('#thana').append(result);
                        }
                    });
                }
            });
            
            $('#thana').change(function(){
                var thana=$(this).val();
                if(thana==''){
                  $('#sub_office').html('<option value="">Select SubOffice</option>');
                  $('#postal_code').html('');
                }else{
                    $('#divLoading').addClass('show');
                    $('#sub_office').html('<option value="">Select SubOffice</option>');
                    $('#postal_code').html('');
                    $.ajax({
                        url:'get_data.php',
                        type:'post',
                        data:'thana='+thana+'&type=suboffice',
                        success:function(result){
                            $('#divLoading').removeClass('show');
                            $('#sub_office').append(result);
                        }
                    });
                }
            });
            
            $('#sub_office').change(function(){
                var sub_office=$(this).val();
                jQuery('#postal_code').hide();
                if(sub_office!=''){
                    $('#divLoading').addClass('show');
                    jQuery('#postal_code').show();
                    jQuery('#postal_code').html('');
                    $.ajax({
                        url:'get_data.php',
                        type:'post',
                        data:'sub_office='+sub_office+'&type=postal',
                        success:function(result){
                            $('#divLoading').removeClass('show');
                            $('#postal_code').append(result);
                        }
                    });
                }
            });
            
        });
    </script>
    
</body>

</html>