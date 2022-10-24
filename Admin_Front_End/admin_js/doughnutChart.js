$(document).ready(function(){
    $.ajax({
        url: "http://localhost/Enterprise/Admin_Front_End/admin_js/data_doughnut.php",
        type: "GET",
        success: function(myData){
            var data = JSON.parse(myData);
            var birthday = data['Birthday Party'];
            var farewell = data['Farewell Ceremony'];
            var wedding = data['Wedding Ceremony'];
            var christmas = data['Christmas Celebration'];
            var newyear = data['New Year Celebration'];
            var deepavali =  data['Deepavali Celebration'];
            var raya = data['Raya Aidilfitri Celebration'];
            
            if ($("#doughnutChart").length) {
                var value = birthday;
                var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
                var doughnutPieData = {
                  datasets: [{
                    data: [birthday, 2, 3, 4, 5, 6, 7],
                    backgroundColor: [
                      "#1F3BB3",
                      "#FDD0C7",
                      "#52CDFF",
                      "#81DADA",
                      "#ABC9FF",
                      "#676FA3",
                      "#F5EEDC"
                    ],
                    borderColor: [
                      "#1F3BB3",
                      "#FDD0C7",
                      "#52CDFF",
                      "#81DADA",
                      "#ABC9FF",
                      "#676FA3",
                      "#F5EEDC"
                    ]
                  }],

                  // These labels appear in the legend and in the tooltips when hovering different arcs
                  labels: [
                    'Birthday Party',
                    'Farewell Ceremony',
                    'Wedding Ceremony',
                    'Christmas Celebration',
                    'New Year Celebration',
                    'Deepavali Celebration',
                    'Raya Aidilfitri Celebration'
                  ]
                };
                var doughnutPieOptions = {
                  cutoutPercentage: 50,
                  animationEasing: "easeOutBounce",
                  animateRotate: true,
                  animateScale: false,
                  responsive: true,
                  maintainAspectRatio: true,
                  showScale: true,
                  legend: false,
                  legendCallback: function (chart) {
                    var text = [];
                    var index = 0;
                    
                    text.push('<div class="chartjs-legend"><ul class="list justify-content-evenly align-items-center">');
                    for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                        
                        if(index === 0){
                            text.push('<li><span style="margin-left: 10px; background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                            text.push('</span>');
                            
                            if (chart.data.labels[i]) {
                                text.push(chart.data.labels[i]);
                            }
                            index+=1;
                            
                        }else if(index % 3 === 0){
                            text.push('<span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                            text.push('</span>');
                            
                            if (chart.data.labels[i]) {
                                text.push(chart.data.labels[i]);
                            }
                            text.push('</li>');
                            index=0;
                            
                        }else{
                            text.push('<span style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '">');
                            text.push('</span>');
                            
                            if (chart.data.labels[i]) {
                                text.push(chart.data.labels[i]);
                            }
                            
                            index+=1;
                        }
                        
                        
                    }
                    text.push('</div></ul>');
                    return text.join("");
                  },

                  layout: {
                    padding: {
                      left: 0,
                      right: 0,
                      top: 0,
                      bottom: 0
                    }
                  },
                  tooltips: {
                    callbacks: {
                      title: function(tooltipItem, data) {
                        return data['labels'][tooltipItem[0]['index']];
                      },
                      label: function(tooltipItem, data) {
                        return data['datasets'][0]['data'][tooltipItem['index']];
                      }
                    },

                    backgroundColor: '#fff',
                    titleFontSize: 14,
                    titleFontColor: '#0B0F32',
                    bodyFontColor: '#737F8B',
                    bodyFontSize: 11,
                    displayColors: false
                  }
                };
                var doughnutChart = new Chart(doughnutChartCanvas, {
                  type: 'doughnut',
                  data: doughnutPieData,
                  options: doughnutPieOptions
                });
                document.getElementById('doughnut-chart-legend').innerHTML = doughnutChart.generateLegend();
            }
            
            
        },
        error: function(data){
            
        }
    });
});


