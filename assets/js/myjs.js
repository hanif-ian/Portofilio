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