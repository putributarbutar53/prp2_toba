<script type="text/javascript">
    $(document).ready(function() {
        barchart = new Highcharts.Chart({
            chart: {
                backgroundColor: '#FCFFC5',
                // backgroundColor: '#d2e4da',
                renderTo: 'rating-mandatory-papbd',
                type: 'column'
            },
            colors: ['#ff8b00', '#00b3b3', '#b37700', '#605ca8', '#ff8b00', '#00b3b3', '#b37700', '#605ca8'],
            title: {
                text: 'MANDATORY SPENDING P APBD  <?=$tahun_data?>'
            },
            xAxis: {
                // lineColor: '#000',
                categories: [<?=$arr_nama_kabupaten123?>],
                labels: {
                    style: {
                        color: '#000000'
                    }
                }
            },
            yAxis: {
                gridLineColor: '#197F07',
                title: {
                    text: 'Persen'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
              plotOptions: {
                  series: {
                      point: {
                          events: {
                              click: function(event) {
                                  console.log(this);
                                  this.update({ color: '#049d08' }, true, false);
                                  }
                          }
                      }
                  }
              },
                exporting: { enabled: false },
                series: [{
                    type: 'column',
                    name: 'PENDIDIKAN',
                    data: [<?=$arr_pendidikan_p?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            if (this.y < 20) {
                              return '<span style="color: red">' + this.y.toFixed(2) + '</span>';
                            } else {
                              return '<span style="color: black">' + this.y.toFixed(1) + '</span>';
                            }
                          }
                      }
                },{
                    type: 'column',
                    name: 'KESEHATAN',
                    data: [<?=$arr_kesehatan_p?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            if (this.y < 10) {
                              return '<span style="color: red">' + this.y.toFixed(2) + '</span>';
                            } else {
                              return '<span style="color: black">' + this.y.toFixed(1) + '</span>';
                            }
                          }
                      }
                },{
                    type: 'column',
                    name: 'INFRASTRUKTUR',
                    data: [<?=$arr_infrastruktur_p?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            if (this.y < 25) {
                              return '<span style="color: red">' + this.y.toFixed(2) + '</span>';
                            } else {
                              return '<span style="color: black">' + this.y.toFixed(1) + '</span>';
                            }
                          }
                      }
                },{
                    type: 'column',
                    name: 'DANA DESA',
                    data: [<?=$arr_desa_p?>],
                    dataLabels: {
                          enabled: true,
                          formatter: function() {
                            if (this.y < 10) {
                              if (this.y == 0) {
                                return '<span style="color: red"></span>';
                              }
                              else{
                                return '<span style="color: red">' + this.y.toFixed(2) + '</span>';
                              }
                            } else {
                              return '<span style="color: black">' + this.y.toFixed(1) + '</span>';
                            }
                          }
                      }
                }, {
                    type: 'spline',
                    name: 'UU MANDATORY PENDIDIKAN',
                    data: [<?=$arr_pendidikan_uu?>],
                    marker: {
                        lineWidth: 1
                    }
                }, {
                    type: 'spline',
                    name: 'UU MANDATORY KESEHATAN',
                    data: [<?=$arr_kesehatan_uu?>],
                    marker: {
                        lineWidth: 1
                    }
                }, {
                    type: 'spline',
                    name: 'UU MANDATORY INFRASTRUKTUR',
                    data: [<?=$arr_infrastruktur_uu?>],
                    marker: {
                        lineWidth: 1
                    }
                }, {
                    type: 'spline',
                    name: 'UU MANDATORY DANA DESA',
                    data: [<?=$arr_desa_uu?>],
                    marker: {
                        lineWidth: 1
                    }
                }]
        });
    });
    
</script>