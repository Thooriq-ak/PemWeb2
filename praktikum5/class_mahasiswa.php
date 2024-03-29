<?php

class Mahasiswa {
    // Property
    public $ipk;
    public $nama;
    public $nim;
    public $prodi;
    public $angkatan;


    // Method
    function __construct($_nim, $_nama){
        $this->nim = $_nim;
        $this->nama = $_nama;
    }

    function predikat_ipk(){
        if($this->ipk < 2.0){
            return 'Cukup';
        }elseif($this->ipk >= 2.0 && $this->ipk < 3.0){
            return 'Baik';
        }elseif($this->ipk >= 3.0 && $this->ipk < 3.75){
            return 'Memuaskan';
        }elseif($this->ipk >= 3.75 && $this->ipk <= 4.0){
            return 'Cum Laude';
        } else {
            return 'Nilai Error 404';
        }
    }


}

// instance object

$mahasiswa1 = new Mahasiswa(110223276, 'Thooriq Abdul Karim');
$mahasiswa1->ipk = 4.0;
$mahasiswa1->prodi = 'Teknik Informasi';
$mahasiswa1->angkatan = 2023;
$predikat = $mahasiswa1->predikat_ipk();
?>