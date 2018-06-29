<?php require_once('banco/conexao.php');
  $listaG = array();
  #$lista1 = array();
  

  $i = 0;
  $query = "SELECT a.ano_formacao AS anoG, COUNT(e.RA) AS alunosG FROM egressos AS e INNER JOIN
                ano AS a ON e.ano_id = a.id WHERE cursos_id= 1   GROUP BY a.ano_formacao ";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
  
      $anosG = $row->anoG;
      $alunosG = $row->alunosG;
      
      $listaG[] = ['anoG' => $anosG, 'totalAlunosG' => $alunosG];
      
  
  }
  
  
  #$lista1 = array();
  
//------------------------------------------------------------------------------------------------
$listaE = array();
  #$lista1 = array();
  

  $i = 0;
  $query = "SELECT a.ano_formacao AS anoE, COUNT(e.RA) AS alunosE FROM egressos AS e INNER JOIN
                ano AS a ON e.ano_id = a.id WHERE cursos_id= 2   GROUP BY a.ano_formacao ";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
  
      $anosE = $row->anoE;
      $alunosE = $row->alunosE;
      
      $listaE[] = ['anoE' => $anosE, 'totalAlunosE' => $alunosE];
      
  
  }

//-------------------------------------------------------------------------------------------------

$listaC = array();
  #$lista1 = array();
  

  $i = 0;
  $query = "SELECT a.ano_formacao AS anoC, COUNT(e.RA) AS alunosC FROM egressos AS e INNER JOIN
                ano AS a ON e.ano_id = a.id WHERE cursos_id= 3   GROUP BY a.ano_formacao ";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
  
      $anosC = $row->anoC;
      $alunosC = $row->alunosC;
      
      $listaC[] = ['anoC' => $anosC, 'totalAlunosC' => $alunosC];
      
  
  }

//-----------------------------------------------------------------------------------------------------


$listaT = array();
  #$lista1 = array();
  

  $i = 0;
  $query = "SELECT a.ano_formacao AS anoT, COUNT(e.RA) AS alunosT FROM egressos AS e INNER JOIN
                ano AS a ON e.ano_id = a.id WHERE cursos_id= 4   GROUP BY a.ano_formacao ";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
  
      $anosT = $row->anoT;
      $alunosT = $row->alunosT;
      
      $listaT[] = ['anoT' => $anosT, 'totalAlunosT' => $alunosT];
      
  
  }
//------------------------------------------------------------------------------------------------------
// Média de PR
$listaMedia = array();
 
  

  $i = 0;
  $query = "SELECT a.ano_formacao AS anoM, AVG(e.PR) AS PR FROM egressos AS e INNER JOIN ano AS a ON e.ano_id = a.id   GROUP BY a.ano_formacao";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
  
      $anoMedia = $row->anoM;
      $media = $row->PR;
      
      $listaMedia[] = ['anoMedia' => $anoMedia, 'PR' => $media];
      
  
  }
//--------------------------------------------------------------------------------------------------------------------------------------------------4
//Cidades 
$listaCidade = array();
 
  

  $i = 0;
  $query = "SELECT a.nome AS cidade, COUNT(e.RA) AS RA FROM egressos AS e INNER JOIN cidade AS a ON e.cidade_id = a.id   GROUP BY a.nome";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
  
      $cidade = $row->cidade;
      $quantidadeRA = $row->RA;
      
      $listaCidade[] = ['cidades' => $cidade, 'RA' => $quantidadeRA];
      
  
  }
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
//Trabalha 
function trabalhaSim($conexao) 
{
$query = "SELECT DISTINCT COUNT(f.trabalha) as S FROM formulario_aluno AS f WHERE f.trabalha = 1 GROUP BY f.trabalha";
$resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $sim = $row->S;

  }
return $sim;
}

function trabalhaNao($conexao) 
{
  $query = "SELECT DISTINCT COUNT(f.trabalha) as N FROM formulario_aluno AS f WHERE f.trabalha = 0 GROUP BY f.trabalha";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $nao = $row->N;
  
  }
  return $nao;
}

function recomendariaSim($conexao) 
{
  $query = "SELECT COUNT(f.recomendaria) as recomendaria FROM formulario_aluno AS f WHERE f.recomendaria = 3 GROUP BY f.recomendaria";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $recomendariaSim = $row->recomendaria;
  
  }
  return $recomendariaSim;
}

function recomendariaNao($conexao) 
{
  $query = "SELECT COUNT(f.recomendaria) as recomendaria FROM formulario_aluno AS f WHERE f.recomendaria = 1 GROUP BY f.recomendaria";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $recomendariaNao = $row->recomendaria;
  
  }
  return $recomendariaNao;
}
function recomendariaTalvez($conexao) 
{
  $query = "SELECT COUNT(f.recomendaria) as recomendaria FROM formulario_aluno AS f WHERE f.recomendaria = 2 GROUP BY f.recomendaria";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $recomendariaTalvez = $row->recomendaria;
  
  }
  return $recomendariaTalvez;
}

function sexoM($conexao) 
{
  $query = "SELECT COUNT(f.sexo) as sexo FROM formulario_aluno AS f WHERE f.sexo = 'M' GROUP BY f.sexo";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $sexoM = $row->sexo;
  
  }
  return $sexoM;
}

function sexoF($conexao) 
{
  $query = "SELECT COUNT(f.sexo) as sexo FROM formulario_aluno AS f WHERE f.sexo = 'F' GROUP BY f.sexo";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $sexoF = $row->sexo;
  
  }
  return $sexoF;
}

function estagioS($conexao) 
{
  $query = "SELECT COUNT(f.estagio) as estagio FROM formulario_aluno AS f WHERE f.estagio = 1 GROUP BY f.estagio";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $estagio = $row->estagio;
  
  }
  return $estagio;
}
function estagioN($conexao) 
{
  $query = "SELECT COUNT(f.estagio) as estagio FROM formulario_aluno AS f WHERE f.estagio = 0 GROUP BY f.estagio";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $estagio = $row->estagio;
  
  }
  return $estagio;
}

function professoresR($conexao) 
{
  $query = "SELECT COUNT(f.professores) as professores FROM formulario_aluno AS f WHERE f.professores = 1 GROUP BY f.professores";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $professores = $row->professores;
  
  }
  return $professores;
} 
function professoresRE($conexao) 
{
  $query = "SELECT COUNT(f.professores) as professores FROM formulario_aluno AS f WHERE f.professores = 2 GROUP BY f.professores";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $professores = $row->professores;
  
  }
  return $professores;
}
function professoresB($conexao) 
{
  $query = "SELECT COUNT(f.professores) as professores FROM formulario_aluno AS f WHERE f.professores = 3 GROUP BY f.professores";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $professores = $row->professores;
  
  }
  return $professores;
}
function professoresI($conexao) 
{
  $query = "SELECT COUNT(f.professores) as professores FROM formulario_aluno AS f WHERE f.professores = 4 GROUP BY f.professores";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $professores = $row->professores;
  
  }
  return $professores;
}
function professoresO($conexao) 
{
  $query = "SELECT COUNT(f.professores) as professores FROM formulario_aluno AS f WHERE f.professores = 5 GROUP BY f.professores";
  $resultado = mysqli_query($conexao,$query);
  while($row = mysqli_fetch_object($resultado)){
    $professores = $row->professores;
  
  }
  return $professores;
}
?>

<script type="text/javascript"> 
(function ($) {
  // USE STRICT
  "use strict";
  
  try {
    //WidgetChart 1
    var ctx = document.getElementById("widgetChart1");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        <?php 
          $quantidade_anos = count($listaE) -1;
          $alunosE = $i;
          for ($i = 0; $i < $quantidade_anos; $i++){

        ?>
        type: 'line',
        data: {
          labels: [<?php echo $listaE[0]['anoE'] ?>, <?php echo $listaE[1]['anoE'] ?>, <?php echo $listaE[2]['anoE'] ?>, <?php echo $listaE[3]['anoE'] ?>],
          type: 'line',
          datasets: [{
            data: [<?php echo $listaE[0]['totalAlunosE'] ?>, <?php echo $listaE[1]['totalAlunosE'] ?>, <?php echo $listaE[2]['totalAlunosE'] ?>, <?php echo $listaE[3]['totalAlunosE'] ?>],
            label: 'Formados',
            backgroundColor: 'rgba(255,255,255,.1)',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
      <?php } ?>
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          padding: {
            layout: {
              left: 0,
              right: 0,
              top: 0,
              bottom: 0
            }
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 0
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 2
    var ctx = document.getElementById("widgetChart2");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        <?php 
              $quantidade_anos = count($listaC) -1;
              $alunosC = $i;
              for ($i = 0; $i < $quantidade_anos; $i++){

        ?>
        type: 'line',
        data: {
          labels: [<?php echo $listaC[0]['anoC'] ?>, <?php echo $listaC[1]['anoC'] ?>, <?php echo $listaC[2]['anoC'] ?>, <?php echo $listaC[3]['anoC'] ?>],
          type: 'line',
          datasets: [{
            data: [<?php echo $listaC[0]['totalAlunosC'] ?>, <?php echo $listaC[1]['totalAlunosC'] ?>, <?php echo $listaC[2]['totalAlunosC'] ?>, <?php echo $listaC[3]['totalAlunosC'] ?>],
            label: 'Formados',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
          },]
        },
        <?php } ?>
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: false,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              tension: 0.00001,
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    }


    //WidgetChart 3


    var ctx = document.getElementById("widgetChart3");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        
        <?php 
              $quantidade_anos = count($listaG) -1;
              $alunosG = $i;
              for ($i = 0; $i < $quantidade_anos; $i++){

              ?>
        type: 'line',
        data: { 
          labels: ['<?php echo $listaG[0]['anoG'] ?>', '<?php echo $listaG[1]['anoG'] ?>', '<?php echo $listaG[2]['anoG'] ?>', '<?php echo $listaG[3]['anoG'] ?>'],
          type: 'line',
          
          datasets: [{
            
            data: [<?php echo $listaG[0]['totalAlunosG'] ?>, <?php echo $listaG[1]['totalAlunosG'] ?>, <?php echo $listaG[2]['totalAlunosG'] ?>, <?php echo $listaG[3]['totalAlunosG'] ?>],  
            
            label: 'Formados',
            backgroundColor: 'transparent',
            borderColor: 'rgba(255,255,255,.55)',
            
          },]
          
        },
        <?php } ?>
        options: {

          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#FFF',
            titleFontFamily: 'Montserrat',
            bodyFontFamily: 'Montserrat',
            cornerRadius: 3,
            intersect: false,
          },
          scales: {
            xAxes: [{
              gridLines: {
                color: 'transparent',
                zeroLineColor: 'transparent'
              },
              ticks: {
                fontSize: 2,
                fontColor: 'transparent'
              }
            }],
            yAxes: [{
              display: false,
              ticks: {
                display: true,
              }
            }]
          },
          title: {
            display: false,
          },
          elements: {
            line: {
              borderWidth: 1
            },
            point: {
              radius: 4,
              hitRadius: 10,
              hoverRadius: 4
            }
          }
        }
      });
    } 


    //WidgetChart 4
    var ctx = document.getElementById("widgetChart4");
    if (ctx) {
      ctx.height = 130;
      var myChart = new Chart(ctx, {
        <?php 
              $quantidade_anos = count($listaT) -1;
              $alunosT = $i;
              for ($i = 0; $i < $quantidade_anos; $i++){

              ?>
        type: 'line',
        data: {
          
          labels: ['<?php echo $listaT[0]['anoT'] ?>', '<?php echo $listaT[1]['anoT'] ?>', '<?php echo $listaT[2]['anoT'] ?>', '<?php echo $listaT[3]['anoT'] ?>'],
          
          datasets: [
            {
              label: "Formados",
              data: [<?php echo $listaT[0]['totalAlunosT'] ?>, <?php echo $listaT[1]['totalAlunosT'] ?>, <?php echo $listaT[2]['totalAlunosT'] ?>, <?php echo $listaT[3]['totalAlunosT'] ?>],
              borderColor: "transparent",
              borderWidth: "5",
              backgroundColor: "rgba(255,255,255,.3)",
            }
          ]
          
        },

        <?php } ?> 

        options: {
          maintainAspectRatio: false,
          legend: {
            display: false,
          },
          scales: {
            xAxes: [{
              display: true,
              categoryPercentage: false,
              barPercentage: true
            }],
            yAxes: [{
              display: false,
                ticks: {
                beginAtZero: false,
                fontFamily: "Poppins"
              }
            

            }]
          }
        }
      });
    }

    // Recent Report
    var ctx = document.getElementById("percent-chart");
    if (ctx) {
      ctx.height = 280;
      var myChart = new Chart(ctx, {
        <?php $yes = trabalhaSim($conexao);
              $nao = trabalhaNao($conexao);
        ?>
       
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "Trabalham",
              data: [<?= $yes ?>, <?= $nao ?>],
              backgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              hoverBackgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Sim',
            'Não'
          ]
        },
      
        options: {
          maintainAspectRatio: true,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }

    // Percent Chart
    var ctx = document.getElementById("percent-chart33");
    if (ctx) {
      ctx.height = 230;
      var myChart = new Chart(ctx, {
        <?php $simRecomendaria = recomendariaSim($conexao);
              $naoRecomendaria = recomendariaNao($conexao);
              $talvezRecomendaria = recomendariaTalvez($conexao);
        ?>
       
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "Trabalham",
              data: [<?= $simRecomendaria ?>, <?= $talvezRecomendaria ?>, <?= $naoRecomendaria ?>],
              backgroundColor: [
                '#90EE90',
                '#87CEAF',
                '#F08080',
              ],
              hoverBackgroundColor: [
                '#90EE70',
                '#87CEBF',
                '#F08095'
              ],
              borderWidth: [
                0, 0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Sim',
            'Talvez',
            'Não'
          ]
        },
      
        options: {
          maintainAspectRatio: true,
          responsive: true,
          cutoutPercentage: 55,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: true
          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }



  try {

    // Recent Report 2
    const bd_brandProduct2 = 'rgba(0,181,233,0.9)'
    const bd_brandService2 = 'rgba(0,173,95,0.9)'
    const brandProduct2 = 'rgba(0,181,233,0.2)'
    const brandService2 = 'rgba(0,173,95,0.2)'

    var data3 = [52, 60, 55, 50, 65, 80, 57, 70, 105, 115]
    var data4 = [102, 70, 80, 100, 56, 53, 80, 75, 65, 90]

    var ctx = document.getElementById("recent-rep2-chart");
    if (ctx) {
      ctx.height = 230;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', ''],
          datasets: [
            {
              label: 'My First dataset',
              backgroundColor: brandService2,
              borderColor: bd_brandService2,
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data3

            },
            {
              label: 'My Second dataset',
              backgroundColor: brandProduct2,
              borderColor: bd_brandProduct2,
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data4

            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                drawOnChartArea: true,
                color: '#f2f2f2'
              },
              ticks: {
                fontFamily: "Poppins",
                fontSize: 12
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 5,
                stepSize: 50,
                max: 150,
                fontFamily: "Poppins",
                fontSize: 12
              },
              gridLines: {
                display: true,
                color: '#f2f2f2'

              }
            }]
          },
          elements: {
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4,
              hoverBorderWidth: 3
            },
            line: {
              tension: 0
            }
          }


        }
      });
    }

  } catch (error) {
    console.log(error);
  }


  try {

    // Recent Report 3
    const bd_brandProduct3 = 'rgba(0,181,233,0.9)';
    const bd_brandService3 = 'rgba(0,173,95,0.9)';
    const brandProduct3 = 'transparent';
    const brandService3 = 'transparent';

    var data5 = [52, 60, 55, 50, 65, 80, 57, 115];
    var data6 = [102, 70, 80, 100, 56, 53, 80, 90];

    var ctx = document.getElementById("recent-rep3-chart");
    if (ctx) {
      ctx.height = 230;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', ''],
          datasets: [
            {
              label: 'My First dataset',
              backgroundColor: brandService3,
              borderColor: bd_brandService3,
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data5,
              pointBackgroundColor: bd_brandService3
            },
            {
              label: 'My Second dataset',
              backgroundColor: brandProduct3,
              borderColor: bd_brandProduct3,
              pointHoverBackgroundColor: '#fff',
              borderWidth: 0,
              data: data6,
              pointBackgroundColor: bd_brandProduct3

            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          scales: {
            xAxes: [{
              gridLines: {
                drawOnChartArea: true,
                color: '#f2f2f2'
              },
              ticks: {
                fontFamily: "Poppins",
                fontSize: 12
              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                maxTicksLimit: 5,
                stepSize: 50,
                max: 150,
                fontFamily: "Poppins",
                fontSize: 12
              },
              gridLines: {
                display: false,
                color: '#f2f2f2'
              }
            }]
          },
          elements: {
            point: {
              radius: 3,
              hoverRadius: 4,
              hoverBorderWidth: 3,
              backgroundColor: '#333'
            }
          }


        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  try {
    //WidgetChart 5
    var ctx = document.getElementById("widgetChart5");
    if (ctx) {
      ctx.height = 220;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['January',  'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
          datasets: [
            {
              label: "My First dataset",
              data: [78, 81, 80, 64, 65, 80, 70, 75, 67, 85, 66, 68],
              borderColor: "transparent",
              borderWidth: "0",
              backgroundColor: "#ccc",
            }
          ]
        },
        options: {
          maintainAspectRatio: true,
          legend: {
            display: false
          },
          scales: {
            xAxes: [{
              display: false,
              categoryPercentage: 1,
              barPercentage: 0.65
            }],
            yAxes: [{
              display: false
            }]
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  try {

    // Percent Chart 2
    var ctx = document.getElementById("percent-chart2");
    if (ctx) {
      ctx.height = 209;
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          datasets: [
            {
              label: "My First dataset",
              data: [60, 40],
              backgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              hoverBackgroundColor: [
                '#00b5e9',
                '#fa4251'
              ],
              borderWidth: [
                0, 0
              ],
              hoverBorderColor: [
                'transparent',
                'transparent'
              ]
            }
          ],
          labels: [
            'Products',
            'Services'
          ]
        },
        options: {
          maintainAspectRatio: false,
          responsive: true,
          cutoutPercentage: 87,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false,
            position: 'bottom',
            labels: {
              fontSize: 14,
              fontFamily: "Poppins,sans-serif"
            }

          },
          tooltips: {
            titleFontFamily: "Poppins",
            xPadding: 15,
            yPadding: 10,
            caretPadding: 0,
            bodyFontSize: 16,
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  try {
    //Sales chart
    var ctx = document.getElementById("sales-chart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        
        type: 'bar',
        data: {
          labels: ["2015", "2016", "2017", "2018"],
          type: 'bar',
          defaultFontFamily: 'Poppins',
          datasets: [{
            <?php 
          $quantidade_anos = count($listaT) -1;
          $alunosT = $i;
          for ($i = 0; $i < $quantidade_anos; $i++){

        ?>
            label: "Transporte",
            data: [<?php echo $listaT[0]['totalAlunosT'] ?>, <?php echo $listaT[1]['totalAlunosT'] ?>, <?php echo $listaT[2]['totalAlunosT'] ?>, <?php echo $listaT[3]['totalAlunosT'] ?>],
            backgroundColor: 'transparent',
            borderColor: 'rgba(220,53,69,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(220,53,69,0.75)',
          <?php } ?>
          }, 
         
          {
            <?php 
          $quantidade_anos = count($listaE) -1;
          $alunosE = $i;
          for ($i = 0; $i < $quantidade_anos; $i++){

        ?>
            label: "Eventos",
            data: [<?php echo $listaE[0]['totalAlunosE'] ?>, <?php echo $listaE[1]['totalAlunosE'] ?>, <?php echo $listaE[2]['totalAlunosE'] ?>, <?php echo $listaE[3]['totalAlunosE'] ?>],
            backgroundColor: 'transparent',
            borderColor: 'rgba(40,167,69,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(40,167,69,0.75)',
            <?php } ?>
          },
        
          {
            <?php 
          $quantidade_anos = count($listaC) -1;
          $alunosC = $i;
          for ($i = 0; $i < $quantidade_anos; $i++){

          ?>
            label: "Comex",
            data: [<?php echo $listaC[0]['totalAlunosC'] ?>, <?php echo $listaC[1]['totalAlunosC'] ?>, <?php echo $listaC[2]['totalAlunosC'] ?>, <?php echo $listaC[3]['totalAlunosC'] ?>],
            backgroundColor: 'transparent',
            borderColor: 'rgba(222,167,69,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(222,167,69,0.75)',
          <?php } ?>
          },
          {
            <?php 
          $quantidade_anos = count($listaG) -1;
          $alunosG = $i;
          for ($i = 0; $i < $quantidade_anos; $i++){

        ?>
            label: "Gestao",
            data: [<?php echo $listaG[0]['totalAlunosG'] ?>, <?php echo $listaG[1]['totalAlunosG'] ?>, <?php echo $listaG[2]['totalAlunosG'] ?>, <?php echo $listaG[3]['totalAlunosG'] ?>],
            backgroundColor: 'transparent',
            borderColor: 'rgba(85,22,69,0.75)',
            borderWidth: 3,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(85,22,69,0.75)',
            <?php }?>  
          }]
          
        },
        
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Poppins',
            bodyFontFamily: 'Poppins',
            cornerRadius: 3,
            intersect: false,
          },
          legend: {
            display: true,
            labels: {
              usePointStyle: true,
              fontFamily: 'Poppins',
            },
          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: true,
                drawBorder: true,
                beginAtZero: true
              },
              scaleLabel: {
                display: true,
                labelString: 'Anos'
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                beginAtZero: true,
                drawBorder: false
              },
              scaleLabel: {
                display: true,
                labelString: 'Quantidade',
                fontFamily: "Poppins"

              },
              ticks: {
                fontFamily: "Poppins"
              }
            }]
          },
          title: {
            display: false,
            text: 'Alunos'
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {

    //Team chart
    var ctx = document.getElementById("team-chart");
    if (ctx) {
      ctx.height = 180;
      var myChart = new Chart(ctx, {
        <?php 
          $quantidade_anos = count($listaMedia) -1;
          $media = $i;
          for ($i = 0; $i < $quantidade_anos; $i++){

        ?>
        type: 'line',
        data: {
          labels: [<?php echo $listaMedia[0]['anoMedia'] ?>, <?php echo $listaMedia[1]['anoMedia'] ?> , <?php echo $listaMedia[2]['anoMedia']?>, <?php echo $listaMedia[3]['anoMedia'] ?>],

          type: 'line',
          defaultFontFamily: 'Poppins',

          datasets: [{
            
                  
            data: [<?php echo $listaMedia[0]['PR']?>, <?php echo $listaMedia[1]['PR']?>, <?php echo $listaMedia[2]['PR']?>, <?php echo $listaMedia[3]['PR']?> ],
            label: "MÉDIA",
            backgroundColor: 'rgba(0,103,255,.15)',
            borderColor: 'rgba(0,103,255,0.5)',
            borderWidth: 3.5,
            pointStyle: 'circle',
            pointRadius: 5,
            pointBorderColor: 'transparent',
            pointBackgroundColor: 'rgba(0,103,255,0.5)',
            
          },]
        }, 
        <?php } ?>  
        options: {
          responsive: true,
          tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            titleFontFamily: 'Poppins',
            bodyFontFamily: 'Poppins',
            cornerRadius: 3,
            intersect: false,
          },
          legend: {
            display: false,
            position: 'top',
            labels: {
              usePointStyle: true,
              fontFamily: 'Poppins',
            },


          },
          scales: {
            xAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: false,
                labelString: 'Month'
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }],
            yAxes: [{
              display: true,
              gridLines: {
                display: false,
                drawBorder: false
              },
              scaleLabel: {
                display: true,
                labelString: 'Percentual de Rendimento',
                fontFamily: "Poppins"
              },
              ticks: {
                fontFamily: "Poppins"
              }
            }]
          },
          title: {
            display: false,
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {
    //bar chart
    var ctx = document.getElementById("barChart");
    if (ctx) {
      ctx.height = 180;
      var myChart = new Chart(ctx, {
        <?php $estagioS = estagioS($conexao);
              $estagioN = estagioN($conexao);?>
        type: 'bar',
        defaultFontFamily: 'Poppins',
        data: {
          labels: ["Sim", "Não"],
          datasets: [
            {
              label: "Estagio",
              data: [<?= $estagioS ?>, <?= $estagioN ?>],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)",
              fontFamily: "Poppins"
            },
                      ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {

    //radar chart
    var ctx = document.getElementById("pieChart1");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          datasets: [{
            data: [45, 25, 20, 10],
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ],
            hoverBackgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(0, 123, 255,0.7)",
              "rgba(0, 123, 255,0.5)",
              "rgba(0,0,0,0.07)"
            ]

          }],
          labels: [
            "Green",
            "Green",
            "Green"
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }



  } catch (error) {
    console.log(error)
  }

  try {

    //line chart
    var ctx = document.getElementById("lineChart");
    if (ctx) {
      ctx.height = 180;
      var myChart = new Chart(ctx, {
        <?php $ruim = professoresR($conexao);
              $regular = professoresRE($conexao);
              $bom = professoresB($conexao);
              $ideal = professoresI($conexao);
              $otimo = professoresO($conexao);  
        ?>
        type: 'bar',
        data: {
          labels: ["Ruim", "Regular", "Bom", "Ideal", "Ótimo"],
          defaultFontFamily: "Poppins",
          datasets: [
            {
              label: "Avaliação Professores",
              borderColor: "rgba(10,10,100,0.9)",
              borderWidth: "1",
              backgroundColor: "rgba(0,0,10,0.7)",
              
              data: [<?= $ruim ?>,<?= $regular?>,<?= $bom?>,<?= $ideal ?>,<?= $otimo ?>]
            },
            
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true,
          tooltips: {
            mode: 'index',
            intersect: true
          },
          hover: {
            mode: 'nearest',
            intersect: false
          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }

        }
      });
    }


  } catch (error) {
    console.log(error);
  }


  try {

    //doughut chart
    var ctx = document.getElementById("doughutChart");
    if (ctx) {
      ctx.height = 280;
      var myChart = new Chart(ctx, {
        <?php 
          $quantidade_anos = count($listaCidade) -1;
          $quantidadeRA = $i;
          for ($i = 0; $i < $quantidade_anos; $i++){

        ?>
        type: 'bar',
        data: {
          datasets: [{
            data: [<?php echo $listaCidade[0]['RA'] ?>,<?php echo $listaCidade[1]['RA'] ?>, <?php echo $listaCidade[2]['RA'] ?>, <?php echo $listaCidade[3]['RA'] ?>, <?php echo $listaCidade[4]['RA'] ?>, <?php echo $listaCidade[5]['RA'] ?>],
            backgroundColor: [
              "rgba(255,0,0,0.5)",
              "rgba(0,255,0,0.5)",
              "rgba(255, 0, 0, 0.8)",
              "rgba(255, 165, 0, 0.8)",
              "rgba(0, 0, 255, 0.8)",
              "rgba(28, 179, 125,0.8)",
            ],
            hoverBackgroundColor: [
              "rgba(255,0,0,0.3)",
              "rgba(0,255,0,0.3)",
              "rgba(255, 0, 0, 0.3)",
              "rgba(255, 165, 0, 0.3)",
              "rgba(0, 0, 255, 0.3)",
              "rgba(28, 179, 125,0.3)",
            ]

          }],
          labels: [
            "<?php echo $listaCidade[0]['cidades'] ?>",
            "<?php echo $listaCidade[1]['cidades'] ?>",
            "<?php echo $listaCidade[2]['cidades'] ?>",
            "<?php echo $listaCidade[3]['cidades'] ?>",
            "<?php echo $listaCidade[4]['cidades'] ?>",
            "<?php echo $listaCidade[5]['cidades'] ?>"
          ]
        },
      <?php } ?>
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }


  } catch (error) {
    console.log(error);
  }


  try {

    //pie chart
    var ctx = document.getElementById("pieChart");
    if (ctx) {
      ctx.height = 260;
      var myChart = new Chart(ctx, {
        <?php $sexoM = sexoM($conexao);
              $sexoF = sexoF($conexao);?>
        type: 'pie',
        data: {
          datasets: [{
            data: [<?= $sexoM ?>, <?= $sexoF ?>],
            backgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(255, 0, 0, 0.6)",
            
             
            ],
            hoverBackgroundColor: [
              "rgba(0, 123, 255,0.9)",
              "rgba(255, 0, 0, 0.6)",
            
            
            ]

          }],
          labels: [
            "Masculino",
            "Feminino",
            
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: true
        }
      });
    }


  } catch (error) {
    console.log(error);
  }

  try {

    // polar chart
    var ctx = document.getElementById("polarChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          datasets: [{
            data: [15, 18, 9, 6],
            backgroundColor: [
              "rgba(2, 123, 299,0.9)",
              "rgba(2, 123, 299,0.8)",
              "rgba(0, 123, 299,0.7)",
              "rgba(0,0,0,0.5)",
              "rgba(0, 123, 255,0.5)"
            ]

          }],
          labels: [
            "Green",
            "Green",
            "Green",
            "Green"
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          responsive: false
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  try {

    // single bar chart
    var ctx = document.getElementById("singelBarChart");
    if (ctx) {
      ctx.height = 150;
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
          datasets: [
            {
              label: "My First dataset",
              data: [40, 55, 75, 81, 56, 55, 40],
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

})(jQuery);



(function ($) {
    // USE STRICT
    "use strict";
    $(".animsition").animsition({
      inClass: 'fade-in',
      outClass: 'fade-out',
      inDuration: 900,
      outDuration: 900,
      linkElement: 'a:not([target="_blank"]):not([href^="#"]):not([class^="chosen-single"])',
      loading: true,
      loadingParentElement: 'html',
      loadingClass: 'page-loader',
      loadingInner: '<div class="page-loader__spin"></div>',
      timeout: false,
      timeoutCountdown: 5000,
      onLoadEvent: true,
      browser: ['animation-duration', '-webkit-animation-duration'],
      overlay: false,
      overlayClass: 'animsition-overlay-slide',
      overlayParentElement: 'html',
      transition: function (url) {
        window.location.href = url;
      }
    });
  
  
  })(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Map
  try {

    var vmap = $('#vmap');
    if(vmap[0]) {
      vmap.vectorMap( {
        map: 'world_en',
        backgroundColor: null,
        color: '#ffffff',
        hoverOpacity: 0.7,
        selectedColor: '#1de9b6',
        enableZoom: true,
        showTooltip: true,
        values: sample_data,
        scaleColors: [ '#1de9b6', '#03a9f5'],
        normalizeFunction: 'polynomial'
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Europe Map
  try {
    
    var vmap1 = $('#vmap1');
    if(vmap1[0]) {
      vmap1.vectorMap( {
        map: 'europe_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true
      });
    }

  } catch (error) {
    console.log(error);
  }

  // USA Map
  try {
    
    var vmap2 = $('#vmap2');

    if(vmap2[0]) {
      vmap2.vectorMap( {
        map: 'usa_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true,
        selectedColor: null,
        hoverColor: null,
        colors: {
            mo: '#001BFF',
            fl: '#001BFF',
            or: '#001BFF'
        },
        onRegionClick: function ( event, code, region ) {
            event.preventDefault();
        }
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Germany Map
  try {
    
    var vmap3 = $('#vmap3');
    if(vmap3[0]) {
      vmap3.vectorMap( {
        map: 'germany_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        onRegionClick: function ( element, code, region ) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();

            alert( message );
        }
      });
    }
    
  } catch (error) {
    console.log(error);
  }
  
  // France Map
  try {
    
    var vmap4 = $('#vmap4');
    if(vmap4[0]) {
      vmap4.vectorMap( {
        map: 'france_fr',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        enableZoom: true,
        showTooltip: true
      });
    }

  } catch (error) {
    console.log(error);
  }

  // Russia Map
  try {
    var vmap5 = $('#vmap5');
    if(vmap5[0]) {
      vmap5.vectorMap( {
        map: 'russia_en',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        hoverOpacity: 0.7,
        selectedColor: '#999999',
        enableZoom: true,
        showTooltip: true,
        scaleColors: [ '#C8EEFF', '#006491' ],
        normalizeFunction: 'polynomial'
      });
    }


  } catch (error) {
    console.log(error);
  }
  
  // Brazil Map
  try {
    
    var vmap6 = $('#vmap6');
    if(vmap6[0]) {
      vmap6.vectorMap( {
        map: 'brazil_br',
        color: '#007BFF',
        borderColor: '#fff',
        backgroundColor: '#fff',
        onRegionClick: function ( element, code, region ) {
            var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
            alert( message );
        }
      });
    }

  } catch (error) {
    console.log(error);
  }
})(jQuery);
(function ($) {
  // Use Strict
  "use strict";
  try {
    var progressbarSimple = $('.js-progressbar-simple');
    progressbarSimple.each(function () {
      var that = $(this);
      var executed = false;
      $(window).on('load', function () {

        that.waypoint(function () {
          if (!executed) {
            executed = true;
            /*progress bar*/
            that.progressbar({
              update: function (current_percentage, $this) {
                $this.find('.js-value').html(current_percentage + '%');
              }
            });
          }
        }, {
            offset: 'bottom-in-view'
          });

      });
    });
  } catch (err) {
    console.log(err);
  }
})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Scroll Bar
  try {
    var jscr1 = $('.js-scrollbar1');
    if(jscr1[0]) {
      const ps1 = new PerfectScrollbar('.js-scrollbar1');      
    }

    var jscr2 = $('.js-scrollbar2');
    if (jscr2[0]) {
      const ps2 = new PerfectScrollbar('.js-scrollbar2');

    }

  } catch (error) {
    console.log(error);
  }

})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Select 2
  try {

    $(".js-select2").each(function () {
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    });

  } catch (error) {
    console.log(error);
  }


})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Dropdown 
  try {
    var menu = $('.js-item-menu');
    var sub_menu_is_showed = -1;

    for (var i = 0; i < menu.length; i++) {
      $(menu[i]).on('click', function (e) {
        e.preventDefault();
        $('.js-right-sidebar').removeClass("show-sidebar");        
        if (jQuery.inArray(this, menu) == sub_menu_is_showed) {
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = -1;
        }
        else {
          for (var i = 0; i < menu.length; i++) {
            $(menu[i]).removeClass("show-dropdown");
          }
          $(this).toggleClass('show-dropdown');
          sub_menu_is_showed = jQuery.inArray(this, menu);
        }
      });
    }
    $(".js-item-menu, .js-dropdown").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
    });

  } catch (error) {
    console.log(error);
  }

  var wW = $(window).width();
    // Right Sidebar
    var right_sidebar = $('.js-right-sidebar');
    var sidebar_btn = $('.js-sidebar-btn');

    sidebar_btn.on('click', function (e) {
      e.preventDefault();
      for (var i = 0; i < menu.length; i++) {
        menu[i].classList.remove("show-dropdown");
      }
      sub_menu_is_showed = -1;
      right_sidebar.toggleClass("show-sidebar");
    });

    $(".js-right-sidebar, .js-sidebar-btn").click(function (event) {
      event.stopPropagation();
    });

    $("body,html").on("click", function () {
      right_sidebar.removeClass("show-sidebar");

    });
 

  // Sublist Sidebar
  try {
    var arrow = $('.js-arrow');
    arrow.each(function () {
      var that = $(this);
      that.on('click', function (e) {
        e.preventDefault();
        that.find(".arrow").toggleClass("up");
        that.toggleClass("open");
        that.parent().find('.js-sub-list').slideToggle("250");
      });
    });

  } catch (error) {
    console.log(error);
  }


  try {
    // Hamburger Menu
    $('.hamburger').on('click', function () {
      $(this).toggleClass('is-active');
      $('.navbar-mobile').slideToggle('500');
    });
    $('.navbar-mobile__list li.has-dropdown > a').on('click', function () {
      var dropdown = $(this).siblings('ul.navbar-mobile__dropdown');
      $(this).toggleClass('active');
      $(dropdown).slideToggle('500');
      return false;
    });
  } catch (error) {
    console.log(error);
  }
})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  // Load more
  try {
    var list_load = $('.js-list-load');
    if (list_load[0]) {
      list_load.each(function () {
        var that = $(this);
        that.find('.js-load-item').hide();
        var load_btn = that.find('.js-load-btn');
        load_btn.on('click', function (e) {
          $(this).text("Loading...").delay(1500).queue(function (next) {
            $(this).hide();
            that.find(".js-load-item").fadeToggle("slow", 'swing');
          });
          e.preventDefault();
        });
      })

    }
  } catch (error) {
    console.log(error);
  }

})(jQuery);
(function ($) {
  // USE STRICT
  "use strict";

  try {
    
    $('[data-toggle="tooltip"]').tooltip();

  } catch (error) {
    console.log(error);
  }

  // Chatbox
  try {
    var inbox_wrap = $('.js-inbox');
    var message = $('.au-message__item');
    message.each(function(){
      var that = $(this);

      that.on('click', function(){
        $(this).parent().parent().parent().toggleClass('show-chat-box');
      });
    });
    

  } catch (error) {
    console.log(error);
  }

})(jQuery);


</script>