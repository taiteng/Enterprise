$(document).ready(function(){
    $.ajax({
        url: "http://localhost/Enterprise/Admin_Front_End/admin_js/data_line.php",
        type: "GET",
        success: function(myData){
            var data = JSON.parse(myData);
            
            var totalPrice = [];
            var eventDate = [];
            
            for(var i in data){
                totalPrice.push(data[i].total_price);
                eventDate.push("Date " + data[i].event_date);
            }
            (function($) {
                'use strict';
                $(function() {
                  if ($("#performaneLine").length) {
                    var graphGradient2 = document.getElementById("performaneLine").getContext('2d');
                    
                    var saleGradientBg2 = graphGradient2.createLinearGradient(100, 0, 50, 150);
                    saleGradientBg2.addColorStop(0, 'rgba(0, 208, 255, 0.19)');
                    saleGradientBg2.addColorStop(1, 'rgba(0, 208, 255, 0.03)');

                    var salesTopData = {
                        labels: eventDate,
                        datasets: [{
                          label: 'Sales Journey Map',
                          data: totalPrice,
                          backgroundColor: saleGradientBg2,
                          borderColor: [
                              '#1F3BB3'
                          ],
                          borderWidth: 1.5,
                          fill: true, // 3: no fill
                          pointBorderWidth: 1,
                          pointRadius: 4,
                          pointHoverRadius: 6,
                          pointBackgroundColor: '#1F3BB3',
                            pointBorderColor: '#fff'
                      }]
                    };

                    var salesTopOptions = {
                      responsive: true,
                      maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: true,
                                    drawBorder: false,
                                    color:"#F0F0F0",
                                    zeroLineColor: '#F0F0F0'
                                },
                                ticks: {
                                  beginAtZero: true,
                                  autoSkip: true,
                                  maxTicksLimit: 4,
                                  fontSize: 10,
                                  color:"#6B778C"
                                }
                            }],
                            xAxes: [{
                              gridLines: {
                                  display: false,
                                  drawBorder: false,
                              },
                              ticks: {
                                beginAtZero: false,
                                autoSkip: true,
                                maxTicksLimit: 7,
                                fontSize: 10,
                                color:"#6B778C"
                              }
                          }],
                        },
                        legend:false,
                        legendCallback: function (chart) {
                          var text = [];
                          text.push('<div class="chartjs-legend"><ul>');
                          for (var i = 0; i < chart.data.datasets.length; i++) {
                            console.log(chart.data.datasets[i]); // see what's inside the obj.
                            text.push('<li>');
                            text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                            text.push(chart.data.datasets[i].label);
                            text.push('</li>');
                          }
                          text.push('</ul></div>');
                          return text.join("");
                        },

                        elements: {
                            line: {
                                tension: 0.4,
                            }
                        },
                        tooltips: {
                            backgroundColor: 'rgba(31, 59, 179, 1)',
                        }
                    }
                    var salesTop = new Chart(graphGradient2, {
                        type: 'line',
                        data: salesTopData,
                        options: salesTopOptions
                    });
                    document.getElementById('performance-line-legend').innerHTML = salesTop.generateLegend();
                  }
                });
              })(jQuery);
            
            
        },
        error: function(data){
            
        }
    });
});


