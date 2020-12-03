<html>
<head>
  <title>Contoh Perhitungan Langsung</title> 
  <script type="text/javascript" language="Javascript">
    // var total=0;
    function OnChange(value){
        // hargasatuan = document.formD.harga.value;
        hargasatuan = document.getElementById('harga').value;
        jumlah = document.getElementById('jmlpsn').value;
        // jumlah = document.formD.jmlpsn.value;
        total = hargasatuan * jumlah;
        document.formD.txtDisplay.value = total;
    }
    </script>
</head>
<body> 
    <form id="formD" name="formD" action="" method="post" enctype="multipart/form-data">
     
     Harga Satuan:
     <br>
     <input type="text" id="harga" name="harga" onkeyup="OnChange(this.value)">
     <br>
     Jumlah :
     <br>
     <input type="text" id="jmlpsn" name="jmlpsn" onkeyup="OnChange(this.value)">
     <br>
     Harga keseluruhan :
     <br>
     <input type="text" name="txtDisplay" value="" readonly="readonly">
    </form> </body> 
</html> 