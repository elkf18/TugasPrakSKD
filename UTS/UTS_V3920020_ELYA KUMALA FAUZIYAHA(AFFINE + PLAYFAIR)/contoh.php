 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Playfair Cipher</title> <!--menampilkan judul pada tab-->

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <meta charset="utf-8">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script language="JavaScript" src="bootstrap/js/util.js"></script>
    <script language="JavaScript" src="bootstrap/js/playfair.js"></script>
    <script language="JavaScript" src="bootstrap/js/keymaker.js"></script>
    <script src="0Home.js" type="text/javascript"></script>
    <script src="8Hill.js" type="text/javascript"></script>
 <div class="container">
        <h2 class="text-center">Affine Cipher</h2> <!--menampilkan judul pada tengah-->
        <div class="form-group">
        <form id="frm1" action="/action_page.php">
            <label>Isi Text</label>
            <input id = "cipherText" type = "text" name = "total" class="form-control"><br>
            <label>Key A</label>
             <input id = "cipherMultiply" type = "text" name = "multiply" class="form-control"><br>
            <label>Key B </label><input id = "cipherShift" type = "text" name = "shift" class="form-control"><br>
            <br>
            <input type = "radio" id = "decryptRadio" name = "cipherOperation" value = "1" checked>
            <label for = "decryptRadio">Decrypt</label><br>
            <input type = "radio" id = "encryptRadio" name = "cipherOperation" value = "2">
            <label for = "encryptRadio">Encrypt</label><br>
        </form>
        <button onclick="myAffineCipher()">Run Cipher</button>
        
        <div class="box-body">
                <label>Hasil</label> <!--menampilkan hasil-->
                    <table class="table table-bordered">
                        <tr style="background-color:#48D1CC"><!--menampilkan warna background-->
                            <td style="text-align:center"><b>
                              <span id='demo'></span><!--memanggil id output-->
                            </b></td>
                        </tr>
                    </table>
                </div>
        
        <script src="0Home.js" type="text/javascript"></script>
        <script src="2Affine.js" type="text/javascript"></script>
    </body>
    </html>


<script src="assets/jquery.min.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity=" sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>  
</script>
</html>