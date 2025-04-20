    document.addEventListener("DOMContentLoaded", function () {
        const openingScreen = document.getElementById("openingScreen");
        const landingPage = document.getElementById("landingPage");

        if (openingScreen && landingPage) {
            // Opening screen tampil 3 detik
            setTimeout(() => {
                openingScreen.style.opacity = "0";

                setTimeout(() => {
                    openingScreen.style.display = "none";
                    landingPage.style.display = "block";

                }, 1000); // Waktu fade out
            }, 3000); // Durasi opening screen
        } else {
            console.error("Elemen openingScreen atau landingPage tidak ditemukan.");
        }
    });


    document.addEventListener("DOMContentLoaded", function () {
        // ✅ Untuk halaman realtime.html
        fetchData();
        setInterval(fetchData, 5000);
    });
    
    // ✅ Ambil data dari PHP dan tampilkan di card
    function fetchData() {
        fetch("php/get_data.php")
            .then(response => {
                if (!response.ok) {
                    throw new Error("Gagal fetch data");
                }
                return response.json();
            })
            .then(data => {
                console.log("Data diterima:", data); // tambahkan log debug
    
                document.getElementById("pm25").innerText = data.pm25 || "Tidak ada data";
                document.getElementById("kadarAsap").innerText = data.kadar_asap || "Tidak ada data";
                document.getElementById("karbonDioxida").innerText = data.karbon_dioxida || "Tidak ada data";
                document.getElementById("suhu").innerText = data.suhu || "Tidak ada data";
                document.getElementById("kelembapan").innerText = data.kelembapan || "Tidak ada data";
                document.getElementById("status").innerText = data.status || "Tidak ada data";
            })
            .catch(error => {
                console.error("Gagal mengambil data:", error);
            });
    }