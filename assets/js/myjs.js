const ctx = document.getElementById('myChart').getContext('2d');

  new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Very Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Very Dissatisfied'],
        datasets: [{
          label: 'Performance',
          data: [220, 210, 85, 10, 0],
          
          fill: true,
          backgroundColor: 'rgba(13, 110, 253, 0.2)',
          borderColor: '#0d6efd',
          borderWidth: 2,
          tension: 0.4
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { display: true }
        },
        scales: {
          y: { beginAtZero: true }
        }
      }
    });

    /* =========================
        SCROLL PROGRESS BAR
       ========================= */

const scrollProgress = document.getElementById("scrollProgress");

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

/*==========
  card
  ==========*/


function showExperience(id, event) {

    event.stopPropagation();

    console.log("ID yang diklik:", id);
    console.log("Data experience:", experiences);

    const experience = experiences.find(
        item => item.id == id
    );

    if (!experience) {
        console.log("Data experience tidak ditemukan!");
        return;
    }

    document.getElementById("experienceTitle").textContent =
        experience.judul;

    document.getElementById("experienceDescription").textContent =
        experience.deskripsi;

    document.getElementById("experiencePosition").textContent =
        experience.posisi;

    document.getElementById("experiencePeriod").textContent =
        experience.periode;

    const card = document.querySelector(".experience-wrapper");

    card.classList.add("flipped");
}

function backToExperience(event) {

    // Hentikan event
    event.stopPropagation();

    const card = document.querySelector(".experience-wrapper");

    card.classList.remove("flipped");
}

function openVote(event) {

    // Mencegah event naik ke parent
    event.stopPropagation();

    const card = document.querySelector(
        ".performance-wrapper"
    );

    card.classList.add("flipped");
}


function closeVote(event) {

    event.stopPropagation();

    const card = document.querySelector(
        ".performance-wrapper"
    );

    card.classList.remove("flipped");

    // Reset hasil vote
    document.getElementById("voteResult").innerText = "";
}


function giveVote(value) {

    const result =
        document.getElementById("voteResult");

    result.innerText =
        "Thank you! your vote is " + value;
}