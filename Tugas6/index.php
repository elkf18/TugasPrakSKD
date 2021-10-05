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
<script language="JavaScript">
//fungsi untuk menjalankan output saat diketik langsung diupdate
function start_update(){
   if (! document.getElementById){
      alert('Sorry, you need a newer browser.');
      return;
   }
   
   if ((! document.Playfair_Loaded) || (! document.Util_Loaded) ||
       (! document.Keymaker_Loaded) ||
       (! document.getElementById('output')))
   {
      window.setTimeout('start_update()', 100);
      return;
   }
   
   Keymaker_Start();
   upd();
}

//fungsi enkripsi
function upd(){
    // mendefiniskan variabel keyunchanged menggunakan option dengan nama skip dikali menggunakan key nya
   var keyunchanged = IsUnchanged(document.encoder.skip) *
       IsUnchanged(document.encoder.key);

    //jika variabel keyunchanged false maka
   if (keyunchanged == 0)
   {
      // mengupdate kotak pada penggunaan tabel
      //mendefinisikan  k dan elem
      var k, elem;
      
      //membuat kunci alpabet
      k = MakeKeyedAlphabet(document.encoder.skip.value +
         document.encoder.key.value);
      k = k.slice(1, k.length);
      elem = document.getElementById('alphabet');
      elem.innerHTML = HTMLTableau(k);
   }
   
   //jika unchanged di kalikan dengan text, encdec, skipto, dan doubleencode
   if (keyunchanged *
       IsUnchanged(document.encoder.text) *
       IsUnchanged(document.encoder.encdec) *
       IsUnchanged(document.encoder.skipto) *
       IsUnchanged(document.encoder.doubleencode))
   {
    //maka dijalankan window.setTimeout untuk mengeset output dalam waktu 100 milisecond dengan menyertakan fungsi upd() yang mana merupakan fungsi enkripsi
      window.setTimeout('upd()', 100);
      return;
   }

   //untuk meresize bagian text area
   ResizeTextArea(document.encoder.text);

   //mendeklarasikan elem 
   var elem = document.getElementById('output');
   
   //jika encoder text nya tidak sama dengan kosong maka
   if (document.encoder.text.value != "")
   {
        //dijalankan value 1 yaitu merupakan enkripsi
       var flags = 1;

       //jika encoder pada doubleencode checked maka dijalankan dekropsi
       if (document.encoder.doubleencode.checked) {
           flags -= 1;
        }
      elem.innerHTML = SwapSpaces(HTMLEscape(Playfair(document.encoder.encdec.value * 1,
         document.encoder.text.value, document.encoder.skip.value,
         document.encoder.skipto.value, document.encoder.key.value, flags)));
   }
   //jika form belum diisi maka akan muncul  text ini
   else
   {
      elem.innerHTML = "Isikan form Plaintext, dan lihat hasilnya disini!";
   }
      
   window.setTimeout('upd()', 100);
}
//fungsi untuk dekripsi
function kennedy()
{
   document.encoder.encdec.value = -1;
   document.encoder.skip.value = "J";
   document.encoder.skipto.value = "I";
   document.encoder.key.value = "ROYAL NEW ZEALAND NAVY";
   document.encoder.text.value = "KX JEYU REB EZW EHEW RYTU HE YFSKRE " +
      "HE GOYFIWTT TUOLKS YCA JPOBO TE IZONTX BYBW T GONE YC UZWRGD S " +
      "ONSXBOU YWR HEBAAHYUSED Q"
   document.encoder.doubleencode.checked = 0;
}

window.setTimeout('start_update()', 100);

</script>
</head>
<body>
	<div class="container">
		<h2 class="text-center">Playfair Cipher</h2> <!--menampilkan judul pada tengah-->
        <div class="form-group">
		<form name="encoder" method="post" action="#" onsubmit="return false;"> <!--nama encoder dengan action kembali pada halaman tetap-->
                <p><select name="encdec"><!--untuk membuat button option dengan value 1 yaitu enkripsi dan -1 yaitu dekripsi-->
                    <option value="1">Enkripsi
                    <option value="-1">Dekripsi
                </select>
                <p>Ganti huruf <select name="skip"><!--untuk mengganti huruf dari J ke I,  "skip" disini akan diubah menjadi "skipto dengan menggunakan fungsi pada script diatas-->
                           <option value="A">A
                           <option value="B">B
                           <option value="C">C
                           <option value="D">D
                           <option value="E">E
                           <option value="F">F
                           <option value="G">G
                           <option value="H">H
                           <option value="I">I
                           <option value="J" selected>J
                           <option value="K">K
                           <option value="L">L
                           <option value="M">M
                           <option value="N">N
                           <option value="O">O
                           <option value="P">P
                           <option value="Q">Q
                           <option value="R">R
                           <option value="S">S
                           <option value="T">T
                           <option value="U">U
                           <option value="V">V
                           <option value="W">W
                           <option value="X">X
                           <option value="Y">Y
                           <option value="Z">Z
                        </select> menjadi <select name="skipto"></p>
                           <option value="A">A
                           <option value="B">B
                           <option value="C">C
                           <option value="D">D
                           <option value="E">E
                           <option value="F">F
                           <option value="G">G
                           <option value="H">H
                           <option value="I" selected>I
                           <option value="J">J
                           <option value="K">K
                           <option value="L">L
                           <option value="M">M
                           <option value="N">N
                           <option value="O">O
                           <option value="P">P
                           <option value="Q">Q
                           <option value="R">R
                           <option value="S">S
                           <option value="T">T
                           <option value="U">U
                           <option value="V">V
                           <option value="W">W
                           <option value="X">X
                           <option value="Y">Y
                           <option value="Z">Z
                        </select></p>
                <!--untuk membuat item checked dengan dengan dapat menyandikan huruf ganda-->
				<p><input type=checkbox name="doubleencode" CHECKED> Menyandikan huruf ganda (bawah dan kanan satu tempat)</p>
                <label>Isi Key</label> <!--menampilkan label-->
                <input type=text name=key value=""  required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')" class="form-control"placeholder="Masukan Key"> <!--memiliki required yg berarti harus diisi/tidak boleh kosong -->
                <table border=0 cellspacing=0 cellpadding=0>
                        <tr><td valign=top>Pengunaan Tabel:</td><td>&nbsp;&nbsp;&nbsp;</td>
                        <td><b><span id=alphabet><tt>A B C D E<br><!--menginputkan fungsi script pada id alphabet-->
                        F G H I K<br>
                        L M N O P<br>
                        Q R S T U<br>
                        V W X Y Z
                        </tt></span></b></td></tr>
                        </table>
                <label>Isi Plaintext</label><!--menampilkan label-->
                <textarea name="text" required="true" oninvalid="this.setCustomValidity('Tidak boleh kosong!')" oninput="setCustomValidity('')"  class="form-control" rows="3" placeholder="Isikan teks disini"></textarea>  <!--memiliki required yg berarti harus diisi/tidak boleh kosong -->

			</div>
			
                
        </form>
				<div class="box-body">
        		<label>Hasil</label> <!--menampilkan hasil-->
          			<table class="table table-bordered">
            			<tr style="background-color:#48D1CC"><!--menampilkan warna background-->
              				<td style="text-align:center"><b>
                		      <span id='output'></span><!--memanggil id output-->
              				</b></td>
            			</tr>
          			</table>
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