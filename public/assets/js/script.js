// masih kosong
function formatBiasa(input) {
    let formatted = input.value.replace(/[^0-9]/g, '')

    input.value = formatted
}
// ai generated
// function validasiPanjangTelepon(input) {
//     const feedback = document.getElementById("no_telepon_feedback");
//     const jumlahDigit = input.value.length;

//     if (jumlahDigit === 0) {
//         input.setCustomValidity("");
//         feedback.textContent = "";
//     } else if (jumlahDigit < 12) {
//         const kurang = 12 - jumlahDigit;
//         input.setCustomValidity("Nomor telepon harus terdiri dari minimal 12 digit.");
//         feedback.textContent = `Masukkan minimal 12 digit angka (kurang ${kurang} digit).`;
//     } else {
//         input.setCustomValidity("");
//         feedback.textContent = "Jumlah digit valid.";
//     }
// }

// const inputNoTelepon = document.getElementById("no_telepon");
// if (inputNoTelepon) {
//     inputNoTelepon.form.addEventListener("reset", () => {
//         inputNoTelepon.setCustomValidity("");
//         document.getElementById("no_telepon_feedback").textContent = "";
//     });
// }

function formatNIS(input) {
    // 1. Hapus semua karakter selain angka yang diketik pengguna
    let value = input.value.replace(/[^0-9]/g, "");

    let formatted = "";

    // 2. Susun ulang formatnya: X.XX.XXXXX
    if (value.length > 0) {
        formatted += value.substring(0, 1); // Ambil digit ke-1
    }
    if (value.length > 1) {
        formatted += "." + value.substring(1, 3); // Tambah titik, lalu ambil digit ke-2 s/d 3
    }
    if (value.length > 3) {
        formatted += "." + value.substring(3, 8); // Tambah titik, lalu ambil sisa digit
    }

    // 3. Tampilkan kembali ke dalam kotak input
    input.value = formatted;
}
