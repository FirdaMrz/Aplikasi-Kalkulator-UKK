<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLIKASI KALKULATOR</title>
    <style>

    /* Mengatur tampilan utama halaman */
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Mengisi tinggi seluruh viewport */
            background: linear-gradient(135deg, #121212, #3a3a52); /* Latar belakang gradasi */
            margin: 0;
            background: linear-gradient(rgba(18, 18, 18, 0.8), rgba(58, 58, 82, 0.8)), 
                url('img/bg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Mengatur tampilan utama kalkulator */
        .kalkulator {
            width: 350px;
            background: rgba(255, 255, 255, 0.15); /* Latar belakang transparan */
            padding: 25px;
            border-radius: 15px; /* Sudut membulat */
            backdrop-filter: blur(15px); /* Efek blur di belakang */
            box-shadow: 0px 4px 20px rgba(255, 255, 255, 0.1); /* Bayangan lembut */
            text-align: center;
            transition: 0.3s ease-in-out;
        }

        /* Efek hover pada kalkulator */
        .kalkulator:hover {
            transform: scale(1.02); /* Sedikit membesar saat hover */
            box-shadow: 0px 6px 25px rgba(255, 255, 255, 0.2);
        }

        /* Mengatur tampilan judul */
        h2 {
            color: #fff;
            margin-bottom: 15px;
            font-size: 22px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Mengatur tata letak input angka dan operator */
        .input-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        /* Mengatur tampilan input dan select */
        .input-field, .select-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            background: rgb(255, 254, 254);
            color: #white;
            text-align: center;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        /* Efek hover dan focus pada input dan select */
        .input-field:focus, .select-field:hover {
            border-color: #00ff99;
            box-shadow: 0px 0px 10px rgba(0, 255, 153, 0.5);
        }

        /* Mengatur tampilan tombol */
        .button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            background: linear-gradient(90deg, #00ff99, #00cc77);
            color: #000;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 10px rgba(0, 255, 153, 0.3);
        }

        /* Efek hover pada tombol */
        .button:hover {
            background: linear-gradient(90deg, #00cc77, #009955);
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(0, 255, 153, 0.5);
        }

        /* Mengatur tampilan hasil perhitungan */
        .hasil {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
        }

        /* Mengatur warna teks dalam dropdown operator */
        .select-field option[value="+"] { color: green; }
        .select-field option[value="-"] { color: red; }
        .select-field option[value="*"] { color: blue; }
        .select-field option[value="/"] { color: orange; }

        /* Mengatur tampilan saat mencetak */
        @media print {
            body * {
                visibility: hidden; /* Menyembunyikan semua elemen selain hasil */
            }
            #print-area, #print-area * {
                visibility: visible;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                font-size: 24px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
        <!--Elemen HTML utama untuk tampilan kalkulator-->
        <div class="kalkulator">
            <h2>Kalkulator</h2>
            <div class="input-group">
                <!-- Input angka pertama -->
                <input type="number" id="angka1" class="input-field" placeholder="Angka 1">
                
                <!-- Pilihan operator matematika -->
                <select id="operator" class="select-field">
                    <option value="+" style="color: green;">+</option>
                    <option value="-" style="color: red;">-</option>
                    <option value="*" style="color: blue;">*</option>
                    <option value="/" style="color: orange;">/</option>
                </select>
                
                <!-- Input angka kedua -->
                <input type="number" id="angka2" class="input-field" placeholder="Angka 2">
            </div>

            <!-- Tombol untuk melakukan perhitungan dan mencetak hasil -->
            <button class="button" onclick="hitung()">Hitung</button>
            <button class="button" onclick="printHasil()">Print Hasil</button>
            
            <!-- Area hasil perhitungan -->
            <div class="hasil" id="hasil"></div>
            <div id="print-area" style="display: none;"></div>
        </div>


    <script>
               // Fungsi untuk melakukan perhitungan
               function hitung() {
            // Mengambil nilai dari input angka pertama
            let angka1 = parseFloat(document.getElementById("angka1").value);
            // Mengambil nilai dari input angka kedua
            let angka2 = parseFloat(document.getElementById("angka2").value);
            // Mengambil operator yang dipilih
            let operator = document.getElementById("operator").value;
            let hasil;

            // Mengecek apakah input angka valid atau tidak
            if (isNaN(angka1) || isNaN(angka2)) {
                hasil = "Masukkan angka dengan benar!";
            } else {
                // Melakukan operasi matematika sesuai dengan operator yang dipilih
                switch (operator) {
                    case "+": hasil = angka1 + angka2; break; // Penjumlahan
                    case "-": hasil = angka1 - angka2; break; // Pengurangan
                    case "*": hasil = angka1 * angka2; break; // Perkalian
                    case "/": hasil = angka2 !== 0 ? angka1 / angka2 : "Tidak bisa dibagi 0"; break; // Pembagian dengan pengecekan nol
                    default: hasil = "Operator tidak valid";
                }
            }

            // Menampilkan hasil perhitungan pada elemen hasil
            let tampilanHasil = `${angka1} ${operator} ${angka2} = ${hasil}`;
            document.getElementById("hasil").innerHTML = tampilanHasil;
            document.getElementById("print-area").innerHTML = tampilanHasil;
            document.getElementById("print-area").style.display = "none"; // Menyembunyikan area cetak
        }

        // Fungsi untuk mencetak hasil perhitungan
        function printHasil() {
            // Mengambil isi hasil perhitungan
            let hasil = document.getElementById("print-area").innerHTML;
            
            // Mengecek apakah hasil sudah tersedia sebelum mencetak
            if (hasil === "") {
                alert("Hitung dulu sebelum mencetak!");
            } else {
                document.getElementById("print-area").style.display = "block"; // Menampilkan area cetak
                window.print(); // Mencetak halaman
                document.getElementById("print-area").style.display = "none"; // Menyembunyikan area cetak setelah dicetak
            }
        }

    </script>
</body>
</html>
