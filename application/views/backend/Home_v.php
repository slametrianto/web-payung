<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/highcharts.js"></script>  
<!-- <script src="<?php echo base_url();?>assets/highcharts/theme/skies.js"></script>   -->

                    <br><div class="col-md-6">
                        <div class="panel panel-info" id="demo">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-users"></i></span> Welcome</h3>
                                <div class="panel-toolbar text-right">
                                </div>
                            </div>
              <div class="profit" id="profitClose">
                            <div class="headline ">
                                <h3>
                                    <span>
                                <i class="icon-user"></i>&#160;&#160;Hi, <?php echo strtoupper($pengguna->name); ?></span>
                                </h3>
                            </div>
                            <div>
                              <br><br>Welcome at dashboard administrator.
                              <br><hr>
                              IP Address : <?php
                                            $ip = $_SERVER['REMOTE_ADDR'];
                                        ?> <?php echo $ip; ?> 
                                        <br><hr>Status Login : 
                                        <?php if($pengguna->level_login == 1){
                                echo 'ADMINISTRATOR'; 
                                    }?>
                                    <br><hr>
                                    Computer Name : <?php
                                            echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?><br><br><br>
                                    <br><br>
                                    
                              <br>
                              <br>
                              </div></div></div></div>



                               <div class="col-md-6">
                        <div class="panel panel-info" id="demo">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-users"></i></span> Grafik Article</h3>
                                <div class="panel-toolbar text-right">
                                </div>
                            </div>
                                <div id="article"><br><br><br><br><br><br><br><br><br><br><br><br>
                            </div></div></div>
                            <div> <div></div>



                            <div class="col-md-6">
                        <div class="panel panel-info" id="demo">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-users"></i></span> Grafik Portfolio</h3>
                                <div class="panel-toolbar text-right">
                                </div>
                            </div>
                                <div id="portfolio"><br><br><br><br><br><br><br><br><br><br><br>
                            </div></div></div>
                            <div> <div><div>


                             <div class="col-md-6">
                        <div class="panel panel-info" id="demo">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span class="panel-icon mr5"><i class="ico-users"></i></span> Grafik Administrator</h3>
                                <div class="panel-toolbar text-right">
                                </div>
                            </div>
                            <div class="headline ">
                                <div id="master_administrator"><br><br><br><br><br><br><br><br><br><br>
                            </div></div></div></div></div></div></div></div>
                            <br><br><br>
<?php
    foreach($master_count_article as $result){
        $tag[] = $result->title; 
        $value[] = (float) $result->counter; 
    }
?>
<script type="text/javascript">
 $(document).ready(function() {
                         Math.easeOutBounce = function (pos) {
                        if ((pos) < (1 / 2.75)) {
                            return (7.5625 * pos * pos);
                        }
                        if (pos < (2 / 2.75)) {
                            return (7.5625 * (pos -= (1.5 / 2.75)) * pos + 0.75);
                        }
                        if (pos < (2.5 / 2.75)) {
                            return (7.5625 * (pos -= (2.25 / 2.75)) * pos + 0.9375);
                        }
                        return (7.5625 * (pos -= (2.625 / 2.75)) * pos + 0.984375);
                    };

    $('#article').highcharts({
         chart: {
                type: 'column',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
       },
            title: {
                text: 'Counter Article'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
            categories:  <?php echo json_encode($tag);?>
        },
        exporting: { 
            enabled: false 
        },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Article '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{point.key} </td>' +
                    '<td style="padding:0"><b>{point.y} x viewed </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
           plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },  
        series: [{
            name: 'Report Counter Data Article',
            data: <?php echo json_encode($value);?>,
            shadow : true,
            dataLabels: {
                enabled: true,
               
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Courier, sans-serif'
                }
            }
        }]
    });
});
        </script>

   
                        


<?php
    foreach($master_administrator as $result){
        $username[] = $result->username; 
        $value[] = (float) $result->status; 
    }
?>
<script type="text/javascript">
 $(document).ready(function() {
                         Math.easeOutBounce = function (pos) {
                        if ((pos) < (1 / 2.75)) {
                            return (7.5625 * pos * pos);
                        }
                        if (pos < (2 / 2.75)) {
                            return (7.5625 * (pos -= (1.5 / 2.75)) * pos + 0.75);
                        }
                        if (pos < (2.5 / 2.75)) {
                            return (7.5625 * (pos -= (2.25 / 2.75)) * pos + 0.9375);
                        }
                        return (7.5625 * (pos -= (2.625 / 2.75)) * pos + 0.984375);
                    };

    $('#master_administrator').highcharts({
         chart: {
                type: 'areaspline',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
       },
            title: {
                text: 'Data Administrator'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
            categories:  <?php echo json_encode($username);?>
        },
        exporting: { 
            enabled: false 
        },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Administrator '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{point.key} </td>' +
                    '<td style="padding:0"><b>{point.y} User </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
           plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },  
        series: [{
            name: 'Report Data Administrator',
            data: <?php echo json_encode($value);?>,
            shadow : true,
            dataLabels: {
                enabled: true,
                
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Courier, sans-serif'
                }
            }
        }]
    });
});
        </script>



<?php
    foreach($master_portfolio as $result){
        $client_name[] = $result->client_name; 
        $value[] = $result->counter; 
    }
?>
<script type="text/javascript">
 $(document).ready(function() {
                         Math.easeOutBounce = function (pos) {
                        if ((pos) < (1 / 2.75)) {
                            return (7.5625 * pos * pos);
                        }
                        if (pos < (2 / 2.75)) {
                            return (7.5625 * (pos -= (1.5 / 2.75)) * pos + 0.75);
                        }
                        if (pos < (2.5 / 2.75)) {
                            return (7.5625 * (pos -= (2.25 / 2.75)) * pos + 0.9375);
                        }
                        return (7.5625 * (pos -= (2.625 / 2.75)) * pos + 0.984375);
                    };

    $('#portfolio').highcharts({
         chart: {
                type: 'bar',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
       },
            title: {
                text: 'Data Client'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
            categories:  <?php echo json_encode($client_name);?>
        },
        exporting: { 
            enabled: false 
        },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Client '
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{point.key} </td>' +
                    '<td style="padding:0"><b>{point.y} x viewed </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
           plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },  
        series: [{
            name: 'Report Data Client',
            data: <?php echo json_encode($value);?>,
            shadow : true,
            dataLabels: {
                enabled: true,
               
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Courier, sans-serif'
                }
            }
        }]
    });
});
        </script>