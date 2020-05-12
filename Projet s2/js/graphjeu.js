var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ['Coinflip', 'Couleurs', 'Roulette'],
        datasets: [{
            label: 'My First dataset',
            backgroundColor: ['#B5B6B6','#ffea00','#4a4949'],
            data: [1, 2, 3]
        }]
    },

    // Configuration options go here
    options: {}
});
