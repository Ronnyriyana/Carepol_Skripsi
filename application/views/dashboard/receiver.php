<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Receiver</title>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.2/mqttws31.min.js" type="text/javascript"></script>
      <link href="<?php echo base_url(); ?>assets/mqtt/style.css" rel="stylesheet">
      <script src="<?php echo base_url(); ?>assets/mqtt/mqtt_setting.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
   </head>
   <body>
      <div class="wrapper">
         <h1>mqtt-receiver</h1>
         <form id="connection-information-form">
            <input type="button" onclick="startConnect()" value="Connect">
            <input type="button" onclick="startDisconnect()" value="Disconnect">
         </form>
         <div id="messages"></div>
      </div>
   </body>
</html>
<script>
function insertparameter(data){
   $.post("<?= base_url('index.php/receiver_alat/store'); ?>", data, function(data, status){
        document.getElementById("messages").innerHTML += '<span><b>Input: '+data+'</b></span><br/>';
    });
}
</script>
