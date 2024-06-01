XAMPP Saya Error Setelah Disuruh Update Versi, Jadi Ini Saya Upload Ulang

Buat Commit Pembersihan di Ignore saja itu terakhir kali error tidak bisa push
Terus Ini Cara Penyelesaian saya :

git stash // simpan perubahan
git pull // ambil data terbaru
git stash pop // Kembali ke perubahan terakhir
git push origin {branch} // push ke branch
