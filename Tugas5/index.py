#mendefinisikan fungsi egcd pada variabel a dan b
def egcd(a, b):
  x,y, u,v = 0,1, 1,0
  while a != 0: #menggunakan perulangan while jika a tidak boleh sama dengan 0
    q, r = b//a, b%a    #mendefinisikan objek
    m, n = x-u*q, y-v*q
    b,a, x,y, u,v = a,r, u,v, m,n
  gcd = b
  return gcd, x, y #mengembalikan nilai
 
def modinv(a, m): #mendefinisikan fungsi modivn pada variabel a dan m
  gcd, x, y = egcd(a, m)
  if gcd != 1: #jika gcd tidak sama dengan 1
    return None  # modular inverse tidak tersedia
  else: # jika if tidak dijalankan maka dijalankan else
    return x % m #mengembalikan nilai
 
# fungsi enkripsi dengan memakai variabel text dan key
def affine_encrypt(text, key):
  # Rumus enkripsi affine
  '''
  C = (a*P + b) % 26 
  '''

  return ''.join([ chr((( key[0]*(ord(t) - ord('A')) + key[1] ) % 26)
                + ord('A')) for t in text.upper().replace(' ', '') ])
 
 
# fungsi dekripsi dengan memakai variabel cipher dan key
def affine_decrypt(cipher, key):
  # Rumus dekripsi affine
  '''
  P = (a^-1 * (C - b)) % 26
  '''
  return ''.join([ chr((( modinv(key[0], 26)*(ord(c) - ord('A') - key[1]))
                  % 26) + ord('A')) for c in cipher ])
 
# mendefinisikan fungsi main
def main():
  # memasukan teks dan kunci a dan b nya
  text = 'Elya Kumala Fauziyah'
  key = [3, 5]
 
  # memanggil fungsi enkripsi
  affine_encrypted_text = affine_encrypt(text, key)
 
  # memunculkan plaintext
  print('Plaintext: {}'.format(text))

  # memunculkan kunci A dan B
  print('Kunci A & B: {}'.format(key))

  # memunculkan teks enkripsi
  print('Encrypted Text: {}'.format( affine_encrypted_text ))
 
  # memunculkan teks dekripsi dan memanggil fungsi dekripsi
  print('Decrypted Text: {}'.format
  ( affine_decrypt(affine_encrypted_text, key) ))
 
 
if __name__ == '__main__':
  main()