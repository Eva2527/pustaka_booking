<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.example.com';   // Ganti dengan SMTP server Anda, misalnya 'smtp.gmail.com'
$config['smtp_user'] = 'evamelia474@gmail.com'; // Ganti dengan alamat email Anda
$config['smtp_pass'] = 'feey bcsg bpds dowa'; // Ganti dengan password email Anda
$config['smtp_port'] = 465; // Biasanya 465 untuk SSL, bisa juga 587 untuk TLS
$config['mailtype'] = 'html'; // Menggunakan format HTML untuk email
$config['charset'] = 'iso-8859-1'; // Karakter set
$config['wordwrap'] = TRUE; // Memungkinkan word wrapping di dalam email
$config['smtp_crypto'] = 'ssl'; // Menentukan jenis enkripsi, bisa 'ssl' atau 'tls' (sesuai dengan SMTP server Anda)
$config['newline'] = "\r\n"; // Untuk memastikan email dikirim dengan benar
