<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <title>Hill Cipher</title> <!--menampilkan judul pada tab-->

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <meta charset="utf-8">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">  

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!--Script-->
    <script src="0Home.js" type="text/javascript"></script>
    <script src="8Hill.js" type="text/javascript"></script>

</head>
<body>
    <div class="container">
        <h1 class="text-center">Hill Cipher</h1> <!--menampilkan judul pada tengah-->
        <div class="form-group">
             <input type = "radio" id = "decryptRadio" name = "cipherOperation" value = "1" checked>
            <label for = "decryptRadio">Decrypt</label><br>
            <input type = "radio" id = "encryptRadio" name = "cipherOperation" value = "2">
            <label for = "encryptRadio">Encrypt</label><br>
            <br>
            <form id="frm1">    
                <label>Isi Text</label> <!--menampilkan label-->
                <input type="text" id = "cipherText" name = "total" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')" class="form-control" > <!--untuk menginputkan isi text yang memiliki required yg berarti harus diisi/tidak boleh kosong -->
                        
                <label>Create Matrix</label><!--menampilkan label-->
                <input type="number" id = "cipherSize" type = "text" name = "keySize" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')"  class="form-control" ></input>  <!--untuk membuat matrix yang memiliki required yg berarti harus diisi/tidak boleh kosong -->
            </form>
        </div>
        <button onclick="makeHillMatrix()">Create Matrix</button><br><br><!--buttonn onclick untuk membuat matrix-->
        <form id="frm2">
            <div id = "hillMatrix"><!--untuk membuat susunan matrix-->
                <div id = "hillRow1" class = "matrixContainer" style="display: flex; flex-wrap: wrap;">
                    <div class = "cell">
                        <input id = "mat1-1" type = "text" name = "gKey" value = "1" class = "gCell" style="width: 30px;">
                    </div>
                    <div class = "cell" >
                        <input id = "mat1-2" type = "text" name = "gKey" value = "4" class = "gCell" style="width: 30px;">
                    </div>
                    <div class = "cell" >
                        <input id = "mat1-3" type = "text" name = "gKey" value = "0" class = "gCell" style="width: 30px;">
                    </div>
                </div>

                <div id = "hillRow2" class = "matrixContainer" style="display: flex; flex-wrap: wrap;">
                    <div class = "cell" >
                        <input id = "mat2-1" type = "text" name = "gKey" value = "7" class = "gCell" style="width: 30px;">
                    </div>
                    <div class = "cell">
                        <input id = "mat2-2" type = "text" name = "gKey" value = "11" class = "gCell" style="width: 30px;">
                    </div>
                    <div class = "cell" >
                        <input id = "mat2-3" type = "text" name = "gKey" value = "2" class = "gCell" style="width: 30px;">
                    </div>
                </div>

                <div id = "hillRow3" class = "matrixContainer" style="display: flex; flex-wrap: wrap;">
                    <div class = "cell" >
                        <input id = "mat3-1" type = "text" name = "gKey" value = "0" class = "gCell" style="width: 30px;">
                    </div>
                    <div class = "cell" width = "30px" height = "20px">
                        <input id = "mat3-2" type = "text" name = "gKey" value = "5" class = "gCell" style="width: 30px;">
                    </div>
                    <div class = "cell" width = "30px" height = "20px">
                        <input id = "mat3-3" type = "text" name = "gKey" value = "1" class = "gCell" style="width: 30px;">
                    </div>
                </div>
            </div>
            <br>
                
        </form>
        <button onclick="myHillCipher()">Run</button><!--button untuk memproses fungsi-->
                <div class="box-body">
                <label>Hasil</label> <!--menampilkan hasil-->
                    <table class="table table-bordered">
                        <tr style="background-color:#48D1CC"><!--menampilkan warna background-->
                            <td style="text-align:center"><b>
                               <div id = "results"><p id = "demo"></p></div>
                            </b></td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
</body>

<script src="assets/jquery.min.js"></script> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity=" sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>  
</script>
</html>