//untuk membuat matrix
function makeHillMatrix() {
    var s = document.getElementById("cipherSize"); //mendefinisikan var s dengan cipherSize
    var sString = s.value; //mendefinisikan s string sama dengan dengan s value
    var sNum = parseInt(sString,10); //untuk mengkonversi sebuah string menjadi angka dengan basis 10

    var text = ""; //null string
    var i,j; //deklarasi objek

    for(i = 1; i<=sNum; i++) { //perulangan for dengan i=1, i lebih dari sama dengan sNum dengan 1 bertambah 1 terus
        text += "<div id = \"hillRow" + i.toString() + "\" class = \"matrixContainer\" style = \"display: flex; flex-wrap: wrap;\"";
        for(j = 1; j<=sNum; j++) { //perulangan for dengan i=1, j lebih dari sama dengan sNum dengan j++
            text += "<div class = \"cell\" ><input id = \"mat"; //untuk style
            text += i.toString(); //merubah type data i menjadi type data string
            text += "-";
            text += j.toString();  //merubah type data j menjadi type data string
            text += "\" type = \"text\" name = \"gKey\" value = \"1\" class = \"gCell\" style =\"width: 30px;\"></div>"; //style
        }
        text += "</div>";
    }

    document.getElementById("hillMatrix").innerHTML = text;
}
//fungsi untuk run
function myHillCipher() {
    var t = document.getElementById("cipherText");//mendefinisikan t sama dengan cipherText
    var tString = t.value; //mendefinisikan tString sama dengan tValue

    var s = document.getElementById("cipherSize"); //mendefinisikan s sama dengan cipherSize
    var sString = s.value; //mendefinisikan sString sama dengan sValue
    var sNum = parseInt(sString,10); //untuk mengkonversi sebuah string menjadi angka dengan basis 10

    var text = ""; //null

    
    var test1 = "mat" + (sNum).toString() + "-1";
    var test2 = "mat" + (sNum+1).toString() + "-1";

    if(!htmlHasID(test1) || htmlHasID(test2)) { //eror
        text = "ERROR: Matrix Size not equal to Grid Size<br>Click \"Create Matrix\" to update Grid";
        document.getElementById("demo").innerHTML = text;
        return;
    }
    
    var i,j; //mendeklarasikan objek
    var kMat = [], kRow, name, matElement, matValue, matNum; //mendeklarasikan objek
    for(i = 1; i<=sNum; i++) { 
        kRow = []; 
        for(j = 1; j<=sNum; j++) {
            name = "mat" + i.toString() + "-" + j.toString();
            matElement = document.getElementById("mat" + i.toString() + "-" + j.toString());
            matValue = matElement.value;
            matNum = parseInt(matValue,10);
            kRow.push(matNum);
        }
        kMat.push(kRow);
    }

    var operationInputs = document.getElementsByName("cipherOperation"); //untuk button pilihan
    
    var temp;
    var cipherOperation = "0";

    for(i = 0; i<operationInputs.length; i++) { //untuk menghitung value button pilihan 
        temp = operationInputs[i];
        if(temp.type == "radio" && temp.checked) {
            cipherOperation = temp.value;
        };
    };

    if(cipherOperation == "1") { //jika button menyatakan value 1 yaitu dekripsi 
        text += "Decrypt ciphertext: "; //ditampilkan teks ini
    } else {
        text += "Encrypt plaintext: ";//jika tidak maka ditampilkan teks ini
    };
    //ditampilkan pada hasil
    text += tString + "<br><br>"; //text ditambah dengan tString(plaintext)
    text += "Key Size = " + sString + "<br><br>"; //teks ditambah dengan keysize nya (jumlah matrix) lalu ditambah dengan sString
    text += "Key Matrix = <br><br>"; //teks ditambah dengan KeyMatrix
    for(i = 0; i<sNum; i++) {
        text += "[" + kMat[i].toString() + "]<br>";
    }
    text += "<br>";
    if(cipherOperation == "1") { //jika button menyatakan dekripsi
        text += "Corresponding plaintext: "; 
        text += decryptHill(tString, kMat);
    } else { //jika if tidak dieksekusi maka akan dijalankan else
        text += "Corresponding ciphertext: ";
        text += encryptHill(tString, kMat);
    }

    document.getElementById("demo").innerHTML = text;
};

function getHillTextMatrix(plain, s) {
    plain = plain.toLowerCase(); //mengubah jadi huruf kecil
    var p = plain.length; //menghitung banyak data p
    var total = 0; //totall sama dengan 0
    var i, modu; //deklarasi objek
    var pMat = []; //deklarasi array
    var pRow; //deklarasi objek
    while(total<p-s) { //jika total kurang dari p dikurangi s
        pRow = []; //deklarasi array
        for(i = total; i<total+s; i++) { 
            modu = valLetter(plain, i); //mengubah sesuai dengan fungs valLetter
            pRow.push(modu);//memasukan value ke array
        }
        pMat.push(pRow); //memasukan value ke array
        total += s; //total sama dengan total ditambah dengan s
    }
    
    pRow = []; //deklarasi array
    while(total<p) {
        modu = valLetter(plain, total);
        pRow.push(modu);
        total+=1;
    }
    while(pRow.length < s) { //jika panjang pRow kurang dari s maka
        pRow.push(23);
    }
    pMat.push(pRow);
    return pMat;
}

//fungsi membuat text dari matrix
function getTextFromHillMatrix(a) {
    var text = "", i, j;
    for(i = 0; i<a.length; i++) {
        for(j = 0; j<a[i].length; j++) {
            text+=String.fromCharCode(a[i][j] + 97);
        }
    }
    return text;
}

function encryptHill(plain, mat) { //fungsi enkripsi
    plain = plain.toLowerCase(); //mengubah menjadi huruf kecil 
    var s = mat.length; //menghitung data pada mat
    var pMat = getHillTextMatrix(plain, s); //deklarasi objek
    var aMat = multiplyMatrices(pMat, mat); //deklarasi objek
    var bMat = mod2DArray(aMat, 26); //deklarasi objek dengan huruf alfabet
    return getTextFromHillMatrix(bMat);
}

function decryptHill(cipher, mat) { //fungsi dekripsi
    cipher = cipher.toLowerCase(); ///mengubah jadi huruf kecil
    var s = mat.length; //menghitung data
    var cMat = getHillTextMatrix(cipher, s); //deklarasi objek
    var decKeyMat = invertMatrix(mat); //deklarasi objek
    if(decKeyMat == []) {
        return "ERROR: Key Matrix is not invertible.";
    }
    var det = determinantMatrix(mat); //deklarasi objek ke determinan
    decKeyMat = scalarMultiplyMatrix(decKeyMat, det);//deklarasi objek
    decKeyMat = roundMatrix(decKeyMat); //deklarasi objek
    decKeyMat = scalarMultiplyMatrix(decKeyMat, modInv(det, 26)); //menggunakan modulus inverse
    decKeyMat = mod2DArray(decKeyMat, 26); //deklarasi dengan alfabet
    
    var answerMat = multiplyMatrices(cMat, decKeyMat); //deklarasi objek
    answerMat = mod2DArray(answerMat, 26);//deklarasi objek

    return getTextFromHillMatrix(answerMat);
}