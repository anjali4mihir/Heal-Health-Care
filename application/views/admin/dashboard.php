<style>
    
table tr td{
    width: 8%;
}
#myChart{
    height: 400px !important;
    width: 400px !important;
}
</style>
<div class="full_width main_contentt">
    <div class="full_width main_contentt_padd">
        <div class="full_width four_secs_dash">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url();?>vendors/list/pending"><h2>Pending Approve Partners<span><?= $countPending?></span></h2></a></div></div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url();?>vendors/pharmacy-stores"><h2>Pharmcy Stores<span><?= $countPharmcy?></span></h2></a></div></div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url();?>vendors/pathology-labs"><h2>Pathology Labs<span><?= $countPathology?></span></h2></a></div></div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings"><a href="<?= base_url();?>vendors/radiodiagnostic-centers"><h2>Radiodiagnostic Centers<span><?= $countRadiology?></span></h2></a></div></div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url();?>vendors/register-doctors"><h2>Doctors<span><?= $countDoctors?></span></h2></a></div></div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url();?>vendors/veterinary-doctors"><h2>Veterinary Doctors<span><?= $countAnimal?></span></h2></a></div></div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url();?>vendors/nurse"><h2>Nurse<span><?= $countNurse?></span></h2></a></div></div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"><div class="full_width dash_countings dc_blue"><a href="<?= base_url();?>vendors/physiotherapist"><h2>Physiotherapist<span><?= $countPhysio?></span></h2></a></div></div></div>
                <div class="row">

                
                        
                    <div class="col-6"> 
                        <canvas id="myChart" height="100" width="100"></canvas>
                    </div>
                    <div class="col-6">
                        <h5 class="mt-19">Partners with count values</h5><hr>
                        <table class="table table-sm">
                        <thead>
                            <tr>
                            <td class="min"><b>Name</b></td>
                            <td class="min"><b>Count</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color: rgba(224, 187, 228, 0.2);">
                                <td>Patient</td>
                                <td><?= $countPatient ?></td>
                            </tr>
                            <tr style="background-color: rgba(54, 162, 235, 0.2);">
                                <td>Pharmacy Stores</td>
                                <td><?= $countPharmcy ?></td>
                            </tr>
                            <tr style="background-color: rgba(255, 206, 86, 0.2);">
                                <td>Pathology Labs</td>
                                <td><?= $countPathology ?></td>
                            </tr>
                            <tr style="background-color: rgba(75, 192, 192, 0.2);">
                                <td>Radiodiagnostic Centers</td>
                                <td><?= $countRadiology ?></td>
                            </tr>
                            <tr style="background-color: rgba(153, 102, 255, 0.2);">
                                <td>Doctors</td>
                                <td><?= $countDoctors ?></td>
                            </tr>
                            <tr style="background-color: rgba(192, 223, 247, 0.2);">
                                <td>Veterinary Doctors</td>
                                <td><?= $countAnimal ?></td>
                            </tr>
                            <tr style="background-color: Beige">
                                <td>Nurse</td>
                                <td><?= $countNurse ?></td>
                            </tr>
                            <tr style="background-color: rgba(109, 266, 204,0.2);">
                                <td>Physiotherapist</td>
                                <td><?= $countPhysio ?></td>
                            </tr>
                            
                            </tbody>
                            </table>
                            </div>
                
                <div class="row">
                    <div class="col-md-4"> 
                            <canvas id="myChart1" height="700" width="700"></canvas>
                    </div> 
                    <div class="col-md-4"> 
                            <canvas id="myChart2" height="700" width="700"></canvas>
                    </div>
                    <div class="col-md-4"> 
                            <canvas id="myChart3" height="700" width="700"></canvas>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"> 
                            <canvas id="myChart4" height="700" width="700"></canvas>
                    </div> 
                    <div class="col-md-4"> 
                            <canvas id="myChart5" height="700" width="700"></canvas>
                    </div>
                    <div class="col-md-4"> 
                            <canvas id="myChart6" height="700" width="700"></canvas>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6"> 
                            <canvas id="myChart7" height="500" width="600"></canvas>
                    </div> 
                    <div class="col-md-6"> 
                            <canvas id="myChart8" height="500" width="600"></canvas>
                    </div>
                </div>
       
            </div>
        </div>
    </div>
</div>
<script type="module" src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/helpers.esm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.0/dist/chart.min.js"></script>
<script type="text/javascript">
    var phar = "<?php Print($countPharmcy); ?>";
    var path = "<?php Print($countPathology); ?>";
    var rad = "<?php Print($countRadiology); ?>";
    var dar = "<?php Print($countDoctors); ?>";
    var ver = "<?php Print($countAnimal); ?>";
    var nur = "<?php Print($countNurse); ?>";
    var phy = "<?php Print($countPhysio); ?>";
    var pat = "<?php Print($countPatient); ?>";
    const value1 =[<?php print($value[1].$value[2].$value[3].$value[4].$value[5].$value[6].$value[7].$value[8].$value[9].$value[10].$value[11].$value[12]);?>];
    const value2 =[<?php print($value1[1].$value1[2].$value1[3].$value1[4].$value1[5].$value1[6].$value1[7].$value1[8].$value1[9].$value1[10].$value1[11].$value1[12]);?>];
    const value3 =[<?php print($value2[1].$value2[2].$value2[3].$value2[4].$value2[5].$value2[6].$value2[7].$value2[8].$value2[9].$value2[10].$value2[11].$value2[12]);?>];
    const value4 =[<?php print($value3[1].$value3[2].$value3[3].$value3[4].$value3[5].$value3[6].$value3[7].$value3[8].$value3[9].$value3[10].$value3[11].$value3[12]);?>];
    const value5 =[<?php print($value4[1].$value4[2].$value4[3].$value4[4].$value4[5].$value4[6].$value4[7].$value4[8].$value4[9].$value4[10].$value4[11].$value4[12]);?>];
    const value6 =[<?php print($value5[1].$value5[2].$value5[3].$value5[4].$value5[5].$value5[6].$value5[7].$value5[8].$value5[9].$value5[10].$value5[11].$value5[12]);?>];
    const value7 =[<?php print($value6[1].$value6[2].$value6[3].$value6[4].$value6[5].$value6[6].$value6[7].$value6[8].$value6[9].$value6[10].$value6[11].$value6[12]);?>];
    const value8 =[<?php print($value7[1].$value7[2].$value7[3].$value7[4].$value7[5].$value7[6].$value7[7].$value7[8].$value7[9].$value7[10].$value7[11].$value7[12]);?>];
    const data = ['rgba(224, 187, 228, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(192, 223, 247, 0.2)',
                'Beige',
                'rgba(109, 266, 204,0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 150, 64, 0.2)',];
const border = [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 103, 207)',
                'rgba(255, 206, 86)',
                'rgba(75, 192, 192)',
                'rgba(153, 102, 255)',
                'rgba(255, 159, 64)',
            ];
    const labels = ['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec'];
    var ctx = document.getElementById('myChart').getContext("2d");;
    var myChart = new Chart(ctx,{
    type: 'pie',
    data: {
        labels: ['patient', 'Pharmcy-Store', 'Labs', 'radiodiagnostic-centers', 'Doctors', 'veterinary-doctors','Nurses','physiotherapist'],
        datasets: [{
            data: [pat,phar,path,rad,dar,ver,nur,phy],
            backgroundColor: data,
            borderColor: border,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('myChart1');
    var myChart1 = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Pharmcy-Store Registration',
            data: value1,
            backgroundColor: data,
            borderColor: border,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('myChart2');
    var myChart1 = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Pathology-Labs Registration',
            data: value2,
            backgroundColor: data,
            borderColor: border,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('myChart3');
    var myChart1 = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Radiodiagnostic-centers Registration',
            data: value3,
            backgroundColor: data,
            borderColor: border,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('myChart4');
    var myChart1 = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Doctors Registration',
            data: value4,
            backgroundColor: data,
            borderColor: border,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('myChart5');
    var myChart1 = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Veterinary-Doctors Registration',
            data: value5,
            backgroundColor: data,
            borderColor: border,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('myChart6');
    var myChart1 = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Nurse Registration',
            data: value6,
            backgroundColor: data,
            borderColor: border,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('myChart7');
    var myChart1 = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Physiotherapist Registration',
            data: value7,
            backgroundColor: data,
            borderColor: border,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('myChart8');
    var myChart1 = new Chart(ctx,{
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Patient Registration',
            data: value8,
            backgroundColor: data,
            borderColor: border,
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>