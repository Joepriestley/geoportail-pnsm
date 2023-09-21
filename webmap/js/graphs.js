


function distributionChart(chartCanvas, data, title){
    // reinitialize canvas chart if it already exists

    // if chartCanvas is ObjecHTMLCanvasElement, then change it to html  canvas element
    if (typeof chartCanvas === 'object'){
        chartCanvas = chartCanvas.getContext('2d');
    }
    var labels = [...data.labels].map(function(text) { return limitedText(text, 15)})
    return new Chart(chartCanvas, {
        type: 'bar',
        data: {
        labels: labels,
        datasets: [{
            label: title,
            data: data.values,
            borderWidth: 1
        }]
        },
        options: {      
            responsive: true,
            maintainAspectRatio: true,
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });


}


function limitedText(text, maxChars){
    return String(text).slice(0, maxChars) + (String(text).length > maxChars ? "..." : "")
}