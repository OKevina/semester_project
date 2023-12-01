<!-- resources/views/linegraph.blade.php -->

<html>
<head>
    <title>Line Graph and Histogram</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Include html2pdf library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
</head>
<body>
    <div>
        <canvas id="myLineChart" width="400" height="200"></canvas>
    </div>
    <div>
        <canvas id="myHistogram" width="400" height="200"></canvas>
    </div>
    <!-- Add export button -->
    <button onclick="exportToPDF()">Export to PDF</button>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctxLine = document.getElementById('myLineChart').getContext('2d');
        var myLineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: @json($lineGraphData['labels']),
                datasets: [{
                    label: 'Line Graph',
                    data: @json($lineGraphData['data']),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false,
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: @json($axisTitles['x']),
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: @json($axisTitles['y']),
                        }
                    }
                },
                
            }
        });

        var ctxHistogram = document.getElementById('myHistogram').getContext('2d');
        var myHistogram = new Chart(ctxHistogram, {
            type: 'bar',
            data: {
                labels: @json($histogramData['labels']),
                datasets: [{
                    label: 'Histogram',
                    data: @json($histogramData['data']),
                    backgroundColor: 'rgba(192, 75, 192, 0.2)',
                    borderColor: 'rgba(192, 75, 192, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: @json($axisTitles['x']),
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Nights',
                        }
                    }
                },
                
            }
        });

        
        window.exportToPDF = function () {
            
            const exportContainer = document.createElement('div');
            exportContainer.appendChild(document.getElementById('myLineChart').cloneNode(true));
            exportContainer.appendChild(document.getElementById('myHistogram').cloneNode(true));

            
            html2pdf().from(exportContainer).save();
        };
    });
    </script>
</body>
</html>
