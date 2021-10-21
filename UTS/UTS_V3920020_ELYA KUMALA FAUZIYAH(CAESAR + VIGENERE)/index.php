<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">

	<title>Caesar Cipher</title> <!--menampilkan judul pada tab-->

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <meta charset="utf-8">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body>
	<div class="container">
		<h2 class="text-center">Caesar Cipher</h2> <!--menampilkan judul pada tengah-->
		<?php
      	if(isset($_POST['submit1'])){        //jika submit1/button enkripsi diklik dengan method post
            function Cipher($ch, $key){ //membuat fungsi Cipher yg memiliki $ch sebagai string dan $key sebagai kunci
                if (!ctype_alpha($ch))  //ctype_alpha memeriksa string dari $ch yg diberikan hanya berisi huruf, jika iya maka akan dialihkan ke return
                        return $ch; //mengembalikan nilai $ch
                $offset = ord(ctype_upper($ch) ? 'A' : 'a');    //ctype_upper pada $ch akan memeriksa setiap karakter dari string dalam huruf besar atau tidak dengan dikembalikan dengan fungsi ord dari karakter pertama dari sebuah string maka A sama dengan a
                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset); //return ini akan mengonversi nilai ASCII menjadi karakter yang akan dihitung dengan fhmod yg nantinya string $ch akan ditambah dengan $key dan dikurangi dengan $offset dan ditambah lagi dengan $offsite
            }function Encipher($input, $key){       //membuat fungsi Enchipher untuk $input dan $key
                $output = "";                       //outputnya kosong berarti hasil pada laman yg sama
                $inputArr = str_split($input);//$inputArr berarti akan melakukan operasi sama dg membagi string $input ke array
                foreach ($inputArr as $ch) //menggunakan foreach untuk perulangan yg mana $inputArr  sama dengan $ch
                        $output .= Cipher($ch, $key);   //outputnya sama dengan fungsi Cipher
                return $output; //mengembalikan nilai $output
            }function Decipher($input, $key){   //membuat fungsi Dechiper
                    return Encipher($input, 26 - $key); //mengembalikan fungsi Enchiper yang berisi $input dan 26 (total huruf) akan dikurangi dengan $key
            }  
      	}else if(isset($_POST['submit2'])){ //jika if yg diatas tidak dieksekusi maka akan dijalankan else if dengan submit2/button deskripsi diklik dengan method post
            function Cipher($ch, $key){ ////membuat fungsi Cipher yg memiliki $ch sebagai string dan $key sebagai kunci
                if (!ctype_alpha($ch)) //ctype_alpha memeriksa string dari $ch yg diberikan hanya berisi huruf, jika iya maka akan dialihkan ke return
                        return $ch; //mengembalikan nilai $ch

                $offset = ord(ctype_upper($ch) ? 'A' : 'a');  //ctype_upper pada $ch akan memeriksa setiap karakter dari string dalam huruf besar atau tidak dengan dikembalikan dengan fungsi ord dari karakter pertama dari sebuah string maka A sama dengan a
                return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset); //return ini akan mengonversi nilai ASCII menjadi karakter yang akan dihitung dengan fhmod yg nantinya string $ch akan ditambah dengan $key dan dikurangi dengan $offset dan ditambah lagi dengan $offsite
            }function Encipher($input, $key){  //membuat fungsi Enchipher untuk $input dan $key
                $output = ""; //outputnya kosong berarti hasil pada laman yg sama
                $inputArr = str_split($input); //$inputArr berarti akan melakukan operasi sama dg membagi string $input ke array
                foreach ($inputArr as $ch) //menggunakan foreach untuk perulangan yg mana $inputArr  sama dengan $ch
                        $output .= Cipher($ch, $key); //outputnya sama dengan fungsi Cipher

                return $output; //mengembalikan nilai $output
            }function Decipher($input, $key){ //membuat fungsi Dechiper
                return Encipher($input, 26 - $key); //mengembalikan fungsi Enchiper yang berisi $input dan 26 (total huruf) akan dikurangi dengan $key
            }
        }
        ?>
		<form name="enkripsi" method="post"> <!--memiliki nama enkripsi dan method post-->
			<div class="form-group">
				<label>Isi Key</label> <!--menampilkan label-->
				<input title="Pilih Key." required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')" type="number" class="form-control" name="metode" placeholder="Masukan Key"> <!--memiliki required yg berarti harus diisi/tidak boleh kosong -->
				<label>Isi Text</label>
				<textarea name="plain" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')" type="text" class="form-control" rows="3" placeholder="Isikan teks disini"></textarea>  <!--memiliki required yg berarti harus diisi/tidak boleh kosong -->

			</div>
			<div class="box-footer">
                <table class="table table-stripped">
                    <tr>
                    <td><input type="submit" name="submit1" value="Enkripsi" style="width: 100%"></td> <!--memiliki button yg memiliki nama submit1 yang akan dihubungkan pada php yg diatas-->
                    <td><input type="submit" name="submit2" value="Deskripsi" style="width: 100%"></td><!--memiliki button yg memiliki nama submit2 yang akan dihubungkan pada php yg diatas-->
                    </tr>
                </table>
            </div>
        </form>
				<div class="box-body">
        		<label>Hasil</label> <!--menampilkan hasil-->
          			<table class="table table-bordered">
            			<tr style="background-color:#48D1CC">
              				<td style="text-align:center"><b>
                			<?php 
                			if (isset($_POST['submit1'])){   //jika submit1 diklik maka akan menampilkan hasil dari fungsi encipher dengan metode yg merupakan kunci pergeseran
                  				echo Encipher($_POST['plain'], $_POST['metode']);
                			}if (isset($_POST['submit2'])){   //jika submit2 diklik maka akan menampilkan hasil dari fungsi decipher dengan metode yg merupakan kunci pergeseran
                  			echo Decipher($_POST['plain'], $_POST['metode']);
                			}
              				?>
              				</b></td>
            			</tr>
          			</table>
        			<label>Teks Asli</label> <!--menampilkan text asli-->
          				<table class="table table-bordered">
            				<tr style="background-color:#48D1CC">
              					<td style="text-align:center"><b>
                				<?php 
                				if (isset($_POST['submit1'])){ //jika submit1 diklik maka akan menampilkan text asli dari fungsi encipher yang telah di dechipher dengan metode yg merupakan kunci pergeseran
                  					echo Decipher(Encipher($_POST['plain'], $_POST['metode']),$_POST['metode']);
                				}if (isset($_POST['submit2'])){ //jika submit2 diklik maka akan menampilkan text asli dari fungsi decipher yang telah di encipher dengan metode yg merupakan kunci pergeseran
                  					echo Encipher(Decipher($_POST['plain'], $_POST['metode']),$_POST['metode']);
                				}
                				?>  
              					</b></td>
            				</tr>
          				</table>
        			<label>Key</label> <!--menampilkan key-->
          				<table class="table table-bordered">
            				<tr style="background-color:#90EE90">
              					<td style="text-align:center"><b>
                				<?php 
                				if (isset($_POST['submit1'])){ //jika submit1 diklik maka akan ditampilkan metode yang merupakan key/kunci pergeserannya
                  					echo $_POST['metode'];
                				}if (isset($_POST['submit2'])){  //jika submit2 diklik maka akan ditampilkan metode yang merupakan key/kunci pergeserannya
                  					echo $_POST['metode'];
                				}
                				?>
              					</b></td>
            				</tr>
          				</table>
          				<br>
          				<br>
      
    					<br>
    				</div>
		</form>
		</div>
	</div>
    <div class="container">
        <h2 class="text-center">Vigenere Cipher</h2> <!--menampilkan judul pada tengah-->
        <?php
        // menginisialisasi variabel
        $pswd = "";
        $code = "";
        $error = "";
        $valid = true;
        $color = "#FF0000";

        // pengkondisian setelah submit dengan method post
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            // mendeklarasikan fungsi encrypt dan decrypt yang mana berada di vigenere.php dan dipanggil dengan require_once
            require_once('vigenere.php');
            //mengeset variabel
            $pswd = $_POST['pswd'];
            $code = $_POST['code'];
    
            //mengecek jika pswd atau key kosong maka akan dijalankan text error dan tidak valid
            if (empty($_POST['pswd'])){
                $error = "Please enter a password!";
                $valid = false;
            }
    
            // mengecek jika text kosong maka akan dijalankan text error dan tidak valid
            else if (empty($_POST['code'])){
                $error = "Please enter some text or code to encrypt or decrypt!";
                $valid = false;
            }
    
            //mengecek jika terdapat alphanumeric/kombinasi angka dan huruf pada pswd/key maka akan dijalankan text error dan tidak valid 
            else if (isset($_POST['pswd'])){
                if (!ctype_alpha($_POST['pswd'])){
                    $error = "Password should contain only alphabetical characters!";
                    $valid = false;
                }
            }
    
            // menginputkan yang valid
            if ($valid){
                // jika button encrypt  diklik maka akan dijalankan fungsi Encipher dan dimunculkan pesan sukses
                if (isset($_POST['encrypt'])){
                    $code = Encipher2($pswd, $code);
                    $error = "Text encrypted successfully!";
                    $color = "#526F35";
                }
            
                // jika button decrypt diklik maka akan dijalankan fungsi Decipher dan dimunculkan pesan sukses
                if (isset($_POST['decrypt'])){
                    $code = Decipher2($pswd, $code);
                    $error = "Code decrypted successfully!";
                    $color = "#526F35";
                }
            }
        }

        ?>

        <form action="index.php" method="post"> <!--memiliki nama enkripsi dan method post-->
            <div class="form-group">
               
                <label>Isi Text</label><!--menampilkan label-->
                <textarea name="code" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')"  class="form-control" rows="3" placeholder="Isikan teks disini"></textarea>  <!--memiliki required yg berarti harus diisi/tidak boleh kosong -->
                <label>Isi Key</label> <!--menampilkan label-->
                <input title="Pilih Key." required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')" type="text" class="form-control" name="pswd" id="pass" placeholder="Masukan Key"> <!--memiliki required yg berarti harus diisi/tidak boleh kosong -->

            </div>
            <div class="box-footer">
                <table class="table table-stripped">
                    <tr>
                    <td><input type="submit" name="encrypt" value="Enkripsi" style="width: 100%" onclick="validate(1)"></td> <!--memiliki button yg memiliki nama encrypt yang akan dihubungkan pada php yg diatas-->
                    <td><input type="submit" name="decrypt" value="Deskripsi" style="width: 100%" onclick="validate(2)"></td><!--memiliki button yg memiliki nama decrypt yang akan dihubungkan pada php yg diatas-->
                    </tr>
                </table>
            </div>
                <tr>
                    <td><center><div style="color: <?php echo htmlspecialchars($color) ?>"><?php echo htmlspecialchars($error) ?></div></center></td> <!--mengambil warna dari htmlspecialchars($color), yang $color nya sudah diinisialiasi diatas dan menggunakan htmlspecialchars($error)-->
                </tr>
        </form>
                <div class="box-body">
                <label>Hasil</label> <!--menampilkan hasil-->
                    <table class="table table-bordered">
                        <tr style="background-color:#48D1CC"><!--menampilkan warna background-->
                            <td style="text-align:center"><b>
                              <?php echo htmlspecialchars($code); ?> <!--menggunakan karakter spesial-->
                            </b></td>
                        </tr>
                    </table>
                    <label>Key</label> <!--menampilkan key-->
                        <table class="table table-bordered">
                            <tr style="background-color:#90EE90"><!--menampilkan warna background-->
                                <td style="text-align:center"><b>
                                <?php 
                                if (isset($_POST['encrypt'])){ //jika encrypt diklik maka akan ditampilkan pswd yang merupakan key/kunci pergeserannya
                                    echo $_POST['pswd'];
                                }if (isset($_POST['decrypt'])){  //jika decrypt diklik maka akan ditampilkan pswd yang merupakan key/kunci pergeserannya
                                    echo $_POST['pswd'];
                                }
                                ?>
                                </b></td>
                            </tr>
                        </table>
                    <label>Text Asli</label> <!--menampilkan text asli-->
                        <table class="table table-bordered">
                            <tr style="background-color:#48D1CC"><!--menampilkan warna background-->
                                <td style="text-align:center"><b>
                                 <?php 
                                if (isset($_POST['encrypt'])){ //jika encrypt diklik maka akan ditampilkan code yang merupakan text aslinya
                                    echo $_POST['code'];
                                }if (isset($_POST['decrypt'])){  //jika decrypt diklik maka akan ditampilkan code yang merupakan text aslinya
                                    echo $_POST['code'];
                                }
                                ?>
                                </b></td>
                            </tr>
                        </table>
                        <br>
                        <br>
      
                        <br>
                    </div>
        </form>
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