# mengimport library
from tkinter import *
from tkinter import filedialog
from tkinter import messagebox 
from Crypto import Random
from Crypto.Cipher import AES
import os
from pathlib import Path
from PIL import ImageTk, Image
import tkinter.font as tkFont
import sys

root= Tk() #membuat window
root.title("Enkripsi dan dekripsi") #mengatur judul
root.geometry("400x390") #mengatur ukuran tampilan window

class Encryptor: #membuat class
    def __init__(self, key): #inisialisasi key
        self.key = key

    def pad(self, s):
        return s + b"\0" * (AES.block_size - len(s) % AES.block_size)

    def encrypt(self, message, key, key_size=256): #fungsi untuk mengenkripsi dengan key size nya maks 256
        message = self.pad(message) #message nya berupa memanggil fungsi def pad dengan message
        iv = Random.new().read(AES.block_size) #untuk merandom
        cipher = AES.new(key, AES.MODE_CBC, iv) #memanggil aes nya
        return iv + cipher.encrypt(message) #memanggil nilai enkripsi

    def encrypt_file(self, file_name): #fungsi untuk inisialisasi file ekripsi
        with open(file_name, 'rb') as fo: #membuka nama file nya dengan dibaca oleh rb
            plaintext = fo.read()
        enc = self.encrypt(plaintext, self.key)
        with open(file_name + ".enc" , 'wb') as fo: #membuka file dengan format .enc dan di tulis oleh wb
            fo.write(enc)
        os.remove(file_name)

    def decrypt(self, ciphertext, key): #fungsi untuk pendekripsian nya
        iv = ciphertext[:AES.block_size] #inisialisasi blok size dari aes
        cipher = AES.new(key, AES.MODE_CBC, iv) #memanggil aes nya
        plaintext = cipher.decrypt(ciphertext[AES.block_size:]) #inisialisasi blok aes
        return plaintext.rstrip(b"\0") #mengembalikan nilai

    def decrypt_file(self, file_name): #fungsi untuk file dekripsi
        with open(file_name, 'rb') as fo: #dibaca dengan rb nama filenya
            ciphertext = fo.read() 
        dec = self.decrypt(ciphertext, self.key)
        with open(file_name[:-4], 'wb') as fo:#di tulis dengan wb
            fo.write(dec)
        os.remove(file_name)
        

key = b'[EX\xc8\xd5\xbfI{\xa2$\x05(\xd5\x18\xbf\xc0\x85)\x10nc\x94\x02)j\xdf\xcb\xc4\x94\x9d(\x9e' #key nya
enc = Encryptor(key) #enc yang terdefinisikan menggunakan fungsi encryptor dari key nya
clear = lambda: os.system('cls') #untuk menghapus


def showimg(): #untuk menampilkan variable yang didefinisikan
    window3 = Toplevel(window2)
    window3.title("Decrypted Image")
    im = Image.open(filename[:-4])
    tkimage = ImageTk.PhotoImage(im)
    myvar=Label(window3,image = tkimage)
    myvar.image = tkimage
    myvar.pack()
    window3.mainloop()

def encrypt(): #fungsi enkripsi
    password=pass1.get(1.0,END)
    f = open(s+r"\data.txt", "w+") #membuka file berformat txt untuk di tulis
    f.write(password) #menulis password
    f.close() #menutup
    enc.encrypt_file(s+r"\data.txt") 
    enc.encrypt_file(filename)
    messagebox.showinfo("Success!", "Image encrypted successfully...") #menampilkan pesan
    window1.destroy() #dihapus
    sys.exit()

def decrypt(): #untuk mendekripsikan
    password2=pass2.get(1.0,END)
    enc.decrypt_file(s+r"\data.txt.enc") #mengubah menjadi format file nya yaitu .txt.enc
    p = ''
    with open(s+r"\data.txt", "r") as f: #untuk membaca data
        p = f.readlines()
    if p[0] == password2: #pengkondisiaj jika p[0] sama dengan password2
        enc.encrypt_file(s+r"\data.txt") #mendekripsi data yang berformat txt
        enc.decrypt_file(filename) #mendekripsi namanya
        messagebox.showinfo("Success!", "Image successfully decrypted!") #menampilkan pesan sukses
        print("Decryption done!") #mengeprint dekripsi selesai
        btn = Button(window2, text="Show File", width=14, height=2, command=showimg) #membuat button dngan aksi showimg
        btn.place(x= 163, y= 280) #peletakan button
    elif pass2.compare("end-1c", "==", "1.0"): #jika password null
        enc.encrypt_file(s+r"\data.txt")
        messagebox.showwarning("Warning!", "Please enter password before proceed!")
    else: #jika password tidak cocok
        enc.encrypt_file(s+r"\data.txt")
        messagebox.showerror("Password Mismatched", "You've entered an incorrect password!")


def choosefile1(): #untuk memilih file
    global filename, s  # deklarasi variable global
    file1= filedialog.askopenfile(mode='r', filetype=[('jpg file', '*.jpg')]) #membuka file dengan format jpg dan jpg.enc
    if file1 is not None:  # jika  file1 tidak kosong maka akan dikembalikan nylainya
        filename= file1.name
        p = Path(filename)
        Label(window1, text = p.name, bg='#111111', fg='white' ).place(x=140,y=155)
        s= str(p.parent)

def choosefile2(): #untuk memilih file
    global filename,s #deklarasi variable global
    file1= filedialog.askopenfile(mode='r', filetype=[('jpg file', '*.jpg.enc')]) #membuka file dengan format jpg dan jpg.enc
    if file1 is not None: #jika  file1 tidak kosong maka akan dikembalikan nylainya
        filename= file1.name
        p = Path(filename)
        Label(window2, text = p.name, bg='#000', fg='#fff').place(x=140,y=75)
        s= str(p.parent)

def openEncrypt(): 
    global window1 #deklarasi varibale global
    global pass1  # deklarasi varibale global
    window1 = Toplevel(root)
    root.withdraw()
    window1.title("Encryption") #judul windownya
    window1.geometry("450x350") #ukuran windownya
    canv = Canvas(window1, width=445, height=345, bg='#111111') #ukuran danwarna window
    canv.grid(row=2, column=3)  # membuat baris sebanyak 2 dan kolom sebanyak 3
    fontStyle = tkFont.Font(family="Lucida Grande", size=11) #pilihan font dan ukuran font
    label_pass = Label(window1, text = "Create Password", bg='#111111', fg='white', font=fontStyle) #membuat label
    label_pass.place(x = 75, y = 60)#peletakan label
    pass1 = Text(window1, height=1, width=18)  # membuat text
    pass1.place(x=200, y=60)  # peletakan text
    encryptbtn = Button(window1, text="Choose File to Encrypt", width=18, height=1, command=choosefile1) #membuat button dengan aksi choosefile1
    encryptbtn.place(x= 145, y= 130) #peletakan button
    btn = Button(window1, text="Encrypt", width=14, height=2, command=encrypt) #membuat button dengan aksi encrypt
    btn.place(x= 160, y= 220) #peletakan button
    window1.mainloop() #menjalankan loop

def openDecrypt():
    global window2 #inisialisasi variable global
    global pass2  # inisialisasi variable global
    window2= Toplevel(root)
    root.withdraw()
    window2.title("Decryption") #judul pada window2
    window2.geometry("450x370") #ukuran pada window2
    canv = Canvas(window2, width=445, height=365, bg='#000') #ukuran kanvas dan warna background
    canv.grid(row=2, column=3) #membuat baris sebanyak 2 dan kolom sebanyak 3
    fontStyle = tkFont.Font(family="Lucida Grande", size=11) #pilihan font dan ukuran font
    decryptbtn = Button(window2, text="Choose File to Decrypt", width=18, height=1, command=choosefile2) #membuat button decrypt
    decryptbtn.place(x= 150, y= 50) #peletakan button
    label_pass = Label(window2, text = "Enter Password", bg='#000', fg='#fff', font=fontStyle) #membuat label
    label_pass.place(x = 75, y = 130) #peletakan label
    pass2= Text(window2, height=1, width=18) #membuat text
    pass2.place(x=195,y=130) #peletakan text
    btn = Button(window2, text="Decrypt", width=14, height=2, command=decrypt) #membuat button
    btn.place(x= 163, y= 220) #peletakan button
    window2.mainloop()  # Menjalankan event loop-nya tkinter

clear()
print("Working on files...") #mengeprint teks
img=Image.open("bg/encry1.jpg") #membuka gambar
img = img.resize((395, 385)) #meresize gambar
bg = ImageTk.PhotoImage(img)   #memanggil fungsi di thinker
label1 = Label( root, image = bg)  #membuat label
label1.place(x = 0, y = 0)  #peletakan label
btn1 = Button(root, text="Encrypt", width=14, height=2, command=openEncrypt) #membuat button dengan aksi openEncrypt
btn1.place(x= 150, y= 127) #peletakan button
btn2 = Button(root, text="Decrypt", width=14, height=2, command=openDecrypt)#membuat button dengan aksi openEncrypt
btn2.place(x=150, y=225)  # peletakan button


root.mainloop() #menjalankan loop

