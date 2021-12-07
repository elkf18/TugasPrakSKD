import Crypto #mengimport library crypto
from Crypto.PublicKey import RSA #mengimmport library RSA
from Crypto import Random  #mengimport library random
from Crypto.Cipher import PKCS1_OAEP #mengimport library PKCS1_OAEP
import ast #mengimport ast

random_generator = Random.new().read #inisialisasi fungsi random generator
key = RSA.generate(1024, random_generator) #inisialisasi key yaitu dengan generate RSA 

publickey = key.publickey() #menginisialisasi publickey

# ENKRIPSI
encryptor = PKCS1_OAEP.new(publickey) #menginisialisasi encryptor sebagai PKCS1_OAEP dengan membuat publickey baru
encrypted = encryptor.encrypt(b'Elya Kumala F, V3920020, D3 Teknik Informatika, elyakumalafauziyah@student.uns.ac.id') #pesan untuk dienkripsi

print('hasil enkripsi:', encrypted)#mengeprint hasil enkripsi

# Menambahkan teks pada file .txt
f = open ('alert-enkripsi.txt', 'a') #mengambil file
f.write('File telah memiliki isi!') #menambahkan isi teks alert ini ke file alert-enkripsi.txt
f.close()

# mengupdate file .txt
f = open ('enkripsi.txt', 'w') #membuka file txt, 'w' adalah write
f.write('Isi file hasil enkripsi telah diupdate!') #teks alert untuk menampilkan update dari file enkripsi.txt
f.write(str(encrypted)) #mendeklarasikan string
f.close()

f = open('enkripsi.txt', 'r') #membuka file txt, 'r' adalah read
message = f.read()

# Dekripsi
decryptor = PKCS1_OAEP.new(key) #membuat fungsi decryptor 
decrypted = decryptor.decrypt(ast.literal_eval(str(encrypted)))

print('Hasil dekripsi:', decrypted)#menampilkan teks

f = open('dekripsi.txt', 'w')  # membuka file txt, 'w' adalah write
f.write('Isi file hasil dekripsi:') #tambahkan isi teks ini ke file dekripsi.txt
f.write(str(decrypted)) #mendeklarasikan string
f.close()
