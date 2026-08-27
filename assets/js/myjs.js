/* =========================
   CHART PERFORMANCE
========================= */

const ctx = document
    .getElementById("myChart")
    .getContext("2d");


// Buat chart
const myChart = new Chart(ctx, {

    type: "line",

    data: {

        labels: [
            "Very Satisfied",
            "Satisfied",
            "Neutral",
            "Dissatisfied",
            "Very Dissatisfied"
        ],

        datasets: [{

            label: "Performance",

            // Data awal
            data: [0, 0, 0, 0, 0],

            fill: true,

            backgroundColor: "rgba(13, 110, 253, 0.2)",

            borderColor: "#0d6efd",

            borderWidth: 2,

            tension: 0.4

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                display: true
            }

        },

        scales: {

            y: {

                beginAtZero: true,

                ticks: {
                    stepSize: 1
                }

            }

        }

    }

});



/* =========================
   AMBIL DATA VOTE DATABASE
========================= */

function loadChart() {

    fetch("ambil_vote.php")

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    "Gagal mengambil data vote"
                );

            }

            return response.json();

        })

        .then(data => {

            console.log(
                "Data vote dari database:",
                data
            );


            myChart.data.datasets[0].data = [

                data["Very Satisfied"] || 0,

                data["Satisfied"] || 0,

                data["Neutral"] || 0,

                data["Dissatisfied"] || 0,

                data["Very Dissatisfied"] || 0

            ];


            myChart.update();

        })

        .catch(error => {

            console.error(
                "Error mengambil vote:",
                error
            );

        });

}


// Ambil data ketika halaman dibuka
loadChart();



/* =========================
   SCROLL PROGRESS BAR
========================= */

const scrollProgress =
    document.getElementById("scrollProgress");


window.addEventListener("scroll", () => {

    const scrollTop = window.scrollY;


    const documentHeight =
        document.documentElement.scrollHeight -
        document.documentElement.clientHeight;


    const scrollPercentage =
        (scrollTop / documentHeight) * 100;


    scrollProgress.style.width =
        scrollPercentage + "%";

});



/* =========================
   EXPERIENCE CARD
========================= */

function showExperience(id, event) {

    event.stopPropagation();


    console.log(
        "ID yang diklik:",
        id
    );


    console.log(
        "Data experience:",
        experiences
    );


    const experience =
        experiences.find(
            item => item.id == id
        );


    if (!experience) {

        console.log(
            "Data experience tidak ditemukan!"
        );

        return;

    }


    document.getElementById(
        "experienceTitle"
    ).textContent =
        experience.judul;


    document.getElementById(
        "experienceDescription"
    ).textContent =
        experience.deskripsi;


    document.getElementById(
        "experiencePosition"
    ).textContent =
        experience.posisi;


    document.getElementById(
        "experiencePeriod"
    ).textContent =
        experience.periode;


    const card =
        document.querySelector(
            ".experience-wrapper"
        );


    card.classList.add("flipped");

}



function backToExperience(event) {

    event.stopPropagation();


    const card =
        document.querySelector(
            ".experience-wrapper"
        );


    card.classList.remove("flipped");

}



/* =========================
   OPEN VOTE CARD
========================= */

function openVote(event) {

    event.stopPropagation();


    const card =
        document.querySelector(
            ".performance-wrapper"
        );


    card.classList.add("flipped");

}



/* =========================
   CLOSE VOTE CARD
========================= */

function closeVote(event) {

    event.stopPropagation();


    const card =
        document.querySelector(
            ".performance-wrapper"
        );


    card.classList.remove("flipped");


    const result =
        document.getElementById(
            "voteResult"
        );


    if (result) {

        result.innerText = "";

    }


    // Hapus efek selected
    document
        .querySelectorAll(".vote-option")
        .forEach(button => {

            button.classList.remove(
                "selected"
            );

        });

}



/* =========================
   LANGSUNG KIRIM VOTE
========================= */

function giveVote(value, button) {

    console.log(
        "Vote yang dipilih:",
        value
    );


    // Kirim langsung ke PHP
    fetch("simpan_vote.php", {

        method: "POST",

        headers: {

            "Content-Type":
                "application/x-www-form-urlencoded"

        },

        body:
            "pilihan=" +
            encodeURIComponent(value)

    })


    .then(response => {

        return response.text();

    })


    .then(data => {

        console.log(
            "Response PHP:",
            data
        );


        if (data.trim() === "success") {


            /* =====================
               VOTE BERHASIL
            ===================== */

            // Tandai tombol
            button.classList.add(
                "selected"
            );


            // Tampilkan alert
            alert(
                "Terima kasih! Vote berhasil dikirim."
            );


            // Update chart
            loadChart();


            // Tunggu sebentar kemudian
            // kembali ke bagian depan
            setTimeout(() => {

                const card =
                    document.querySelector(
                        ".performance-wrapper"
                    );


                card.classList.remove(
                    "flipped"
                );


                // Hapus selected
                button.classList.remove(
                    "selected"
                );

            }, 500);


        } else {


            /* =====================
               VOTE GAGAL
            ===================== */

            alert(
                "Vote gagal dikirim!"
            );


            console.error(
                "Response PHP:",
                data
            );

        }

    })


    .catch(error => {

        console.error(
            "Error:",
            error
        );


        alert(
            "Terjadi kesalahan saat mengirim vote."
        );

    });

}