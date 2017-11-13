<?php

	public function renderChart($tipo, $codEncuesta)
    {
      $chart;
      switch ($tipo) 
      {
        case 'PorcentajesTipo':
          try
          {
            $query = $this->base->prepare("SELECT Perfil.codPerfil 
                                           FROM Perfil 
                                           INNER JOIN Respuesta 
                                           ON Perfil.codPerfil = Respuesta.codPerfil
                                           INNER JOIN Pregunta 
                                           ON Respuesta.codPregunta = Pregunta.codPregunta
                                           INNER JOIN Seccion 
                                           ON Pregunta.codSeccion = Seccion.codSeccion
                                           INNER JOIN Encuesta 
                                           ON Seccion.codEncuesta = ?
                                           WHERE Perfil.Tipo = 'PDI'
                                           ");
            $query->execute(array($codEncuesta));
            $numPDI = $query->rowCount();
            $query->closeCursor();

            $query = $this->base->prepare("SELECT Perfil.codPerfil 
                                           FROM Perfil 
                                           INNER JOIN Respuesta 
                                           ON Perfil.codPerfil = Respuesta.codPerfil
                                           INNER JOIN Pregunta 
                                           ON Respuesta.codPregunta = Pregunta.codPregunta
                                           INNER JOIN Seccion 
                                           ON Pregunta.codSeccion = Seccion.codSeccion
                                           INNER JOIN Encuesta 
                                           ON Seccion.codEncuesta = ?
                                           WHERE Perfil.Tipo = 'PAS'
                                           ");
            $query->execute(array($codEncuesta));
            $numPAS = $query->rowCount();
            $query->closeCursor();  

            $query = $this->base->prepare("SELECT Perfil.codPerfil 
                                           FROM Perfil 
                                           INNER JOIN Respuesta 
                                           ON Perfil.codPerfil = Respuesta.codPerfil
                                           INNER JOIN Pregunta 
                                           ON Respuesta.codPregunta = Pregunta.codPregunta
                                           INNER JOIN Seccion 
                                           ON Pregunta.codSeccion = Seccion.codSeccion
                                           INNER JOIN Encuesta 
                                           ON Seccion.codEncuesta = ?
                                           WHERE Perfil.Tipo = 'Alumno'
                                           ");
            $query->execute(array($codEncuesta));
            $numAlumno = $query->rowCount();
            $query->closeCursor(); 

            $total = $numPDI + $numPAS + $numAlumno;

            $chart = "{  
                    'chart':{  
                      'caption':'Participación en la encuesta',
                      'subCaption':'',
                      'numberSuffix':'%',
                      'paletteColors': '#0075c2,#ff6600,#99ff99',
                      'bgColor': '#ffffff',
                      'showBorder': '0',
                      'showLegend': '1',
                      'showPercentValues': '1'
                    },
                    'data':[  
                      {  
                         'label':'PDI',
                         'value':'" . ($numPDI/$total) . "'
                      },
                      {  
                         'label':'PAS',
                         'value':'" . ($numPAS/$total) ."'
                      },
                      {  
                         'label':'Alumno',
                         'value':'" . ($numAlumno/$total) ."'
                      }
                    ]
                }";       
          }
          catch(Exception $e) { die('Error: ' . $e->getMessage()); }
          break;
        case 'PorcentajesSexo':
          try
          {
            $query = $this->base->prepare("SELECT Perfil.codPerfil 
                                           FROM Perfil 
                                           INNER JOIN Respuesta 
                                           ON Perfil.codPerfil = Respuesta.codPerfil
                                           INNER JOIN Pregunta 
                                           ON Respuesta.codPregunta = Pregunta.codPregunta
                                           INNER JOIN Seccion 
                                           ON Pregunta.codSeccion = Seccion.codSeccion
                                           INNER JOIN Encuesta 
                                           ON Seccion.codEncuesta = ?
                                           WHERE Perfil.Sexo = 'Hombre'
                                           ");
            $query->execute(array($codEncuesta));
            $numHombre = $query->rowCount();
            $query->closeCursor();

            $query = $this->base->prepare("SELECT Perfil.codPerfil 
                                           FROM Perfil 
                                           INNER JOIN Respuesta 
                                           ON Perfil.codPerfil = Respuesta.codPerfil
                                           INNER JOIN Pregunta 
                                           ON Respuesta.codPregunta = Pregunta.codPregunta
                                           INNER JOIN Seccion 
                                           ON Pregunta.codSeccion = Seccion.codSeccion
                                           INNER JOIN Encuesta 
                                           ON Seccion.codEncuesta = ?
                                           WHERE Perfil.Sexo = 'Mujer'
                                           ");
            $query->execute(array($codEncuesta));
            $numMujer = $query->rowCount();
            $query->closeCursor();   

            $total = $numHombre + $numMujer;

            $chart = "{  
                    'chart':{  
                      'caption':'Participación en la encuesta',
                      'subCaption':'',
                      'numberSuffix':'%',
                      'paletteColors': '#0075c2,#1aaf5d',
                      'bgColor': '#ffffff',
                      'showBorder': '0',
                      'showLegend': '1',
                      'showPercentValues': '1'
                    },
                    'data':[  
                      {  
                         'label':'Hombre',
                         'value':'" . ($numHombre/$total) . "'
                      },
                      {  
                         'label':'Mujer',
                         'value':'" . ($numMujer/$total) ."'
                      }
                    ]
                }";         
          }
          catch(Exception $e) { die('Error: ' . $e->getMessage()); }
          break;
      }
      return $chart;
    }

    class Estadisticas {
        
        private $constructorOptions = array();

        private $constructorTemplate = '
        <script type="text/javascript">
            FusionCharts.ready(function () {
                new FusionCharts(__constructorOptions__);
            });
        </script>';

        private $renderTemplate = '
        <script type="text/javascript">
            FusionCharts.ready(function () {
                FusionCharts("__chartId__").render();
            });
        </script>';

        // constructor
        function __construct($type, $id, $width = 400, $height = 300, $renderAt, $dataFormat, $dataSource) 
        {
            isset($type)       ? $this->constructorOptions['type']       = $type : '';
            isset($id)         ? $this->constructorOptions['id']         = $id : 'php-fc-'.time();
            isset($width)      ? $this->constructorOptions['width']      = $width : '';
            isset($height)     ? $this->constructorOptions['height']     = $height : '';
            isset($renderAt)   ? $this->constructorOptions['renderAt']   = $renderAt : '';
            isset($dataFormat) ? $this->constructorOptions['dataFormat'] = $dataFormat : '';
            isset($dataSource) ? $this->constructorOptions['dataSource'] = $dataSource : '';

            $tempArray = array();
            foreach($this->constructorOptions as $key => $value) 
            {
                if ($key === 'dataSource') 
                {
                    $tempArray['dataSource'] = '__dataSource__';
                } 
                else 
                {
                    $tempArray[$key] = $value;
                }
            }
            
            $jsonEncodedOptions = json_encode($tempArray);
            
            if ($dataFormat === 'json') 
            {
                $jsonEncodedOptions = preg_replace('/\"__dataSource__\"/', $this->constructorOptions['dataSource'], $jsonEncodedOptions);
            } 
            elseif ($dataFormat === 'xml') 
            { 
                $jsonEncodedOptions = preg_replace('/\"__dataSource__\"/', '\'__dataSource__\'', $jsonEncodedOptions);
                $jsonEncodedOptions = preg_replace('/__dataSource__/', $this->constructorOptions['dataSource'], $jsonEncodedOptions);
            } 
            elseif ($dataFormat === 'xmlurl') 
            {
                $jsonEncodedOptions = preg_replace('/__dataSource__/', $this->constructorOptions['dataSource'], $jsonEncodedOptions);
            } 
            elseif ($dataFormat === 'jsonurl') 
            {
                $jsonEncodedOptions = preg_replace('/__dataSource__/', $this->constructorOptions['dataSource'], $jsonEncodedOptions);
            }
            $newChartHTML = preg_replace('/__constructorOptions__/', $jsonEncodedOptions, $this->constructorTemplate);

            echo $newChartHTML;
        }

        // render the chart created
        // It prints a script and calls the FusionCharts javascript render method of created chart
        function render() 
        {
           $renderHTML = preg_replace('/__chartId__/', $this->constructorOptions['id'], $this->renderTemplate);
           echo $renderHTML;
        }

    }
?>
