<!DOCTYPE html>
<!--
    Bugs: Team-Seite funktioniert nicht richtig, da mit Bootstrap 3.3 die Navbar-Brand nicht richtig aussieht
    
    ToDo: Filter und Profile in Team-Seite
-->

<?php
        //define "pageNameInNavbar" => array("linkToPhpFile","headerText"), remember to change the values below!
        $pages=array("Überblick"        =>array("pages/index.php","PhysikOnline: Studentisches eLearning der Physik an der Goethe-Universität, Frankfurt"),
                     "ILIAS"            =>array("pages/ilias.php","Ilias - was ist das? - PhysikOnline"),
                     "POKAL"            =>array("pages/pokal.php","POKAL - PhysikOnline"),
                     "RiedbergTV"       =>array("pages/riedbergtv.php","RiedbergTV - PhysikOnline"),
                                         
                     "URL Shortener"    =>array("pages/tinygu.php","TinyGU - PhysikOnline"),
                     "POTT"             =>array("pages/pott.php","POTT - PhysikOnline"),
                     "POAK"             =>array("pages/poak.php","POAK - PhysikOnline"),
                     "Podcast Physik"   =>array("pages/podcastphysik.php","Die Podcast-Wiki Physik - PhysikOnline"),
                     "Uniphi"           =>array("pages/uniphi.php","UniPhi - PhysikOnline"),
                     "SageCell"         =>array("pages/sagecell.php","SageCell-Server - PhysikOnline"),
                     
                     "Team"             =>array("pages/team.php","Das Team von PhysikOnline an der Goethe-Universität"),
                    );

        //define how many navbar-items are in front of, in and after the dropdown menu
        $inFrontOfMenu = 4;
        $inMenu = 6;
        $afterMenu = 1;
        
        $section=array(0,$inFrontOfMenu,$inFrontOfMenu+$inMenu,count($pages));
        $spages=array_keys($pages);
        //set up active page
        $activepage = isset($_GET["page"]) ? $_GET["page"]: $spages[0];
?>

<html lang="de"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="PhysikOnline ist mehr als eine eLearning-Plattform. Wir sind ein Team aus Studenten, die viele Projekte entwickelt haben und ständig neue Ideen umsetzen. Schau es dir an und mach mit!">
    <meta name="author" content="Philip Arnold">
    <link rel="icon" href="/favicon.ico">

    <title>
        <?php 
            if (isset($activepage) and in_array($activepage,$spages))
            {
                //get header text
                echo($pages[$activepage][1]);
            }
            else 
            {
                //default header text
                echo("PhysikOnline: Studentisches eLearning der Physik an der Goethe-Universität, Frankfurt");
            }
        ?>
    </title>

    <!-- styles -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="//pokal.uni-frankfurt.de/data/bootstrap-3.2.0/css/bootstrap-theme.pokal2.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="/css/carousel.css" rel="stylesheet">
	<link href="/css/physikonline.css" rel="stylesheet">
  </head>

<!-- NAVBAR
================================================== -->
<body>
    <div class="navbar-wrapper">
        <div class="container">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/"><img src="//elearning.physik.uni-frankfurt.de/Customizing/global/skin/physik/src/logo_small-new.png" alt="" />PhysikOnline</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <?php
                            //build navbar-links
                            for ($i=$section[0];$i<$section[1];$i++) 
                            {
                                $name=$spages[$i];
                                //first one just to get the homepage working
                                if (!isset($activepage) and $name==$spages[0]) {
                                    echo ("<li class='active'> <a href='/'> $name </a> </li>");
                                } 
                                //set current link as active
                                else if ($activepage==$name) {
                                    echo ("<li class='active'> <a href='?page=$name'> $name </a> </li>");
                                } 
                                //set up all other links
                                else {
                                    echo ("<li> <a href='?page=$name'> $name </a> </li>");
                                }    
                            }                        
                            ?>

                            <li class="dropdown">
                                <a href="#more" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Weitere Projekte <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">Weitere Projekte</li>
                                    <?php
                                        //build navbar-links
                                        for ($i=$section[1];$i<$section[2];$i++) 
                                        {
                                            $name=$spages[$i];
                                            if ($activepage==$name) {
                                                echo ("<li class='active'> <a href='?page=$name'> $name </a> </li>");
                                            } 
                                            else {
                                                echo ("<li> <a href='?page=$name'> $name </a> </li>");
                                            }    
                                        }                        
                                    ?>
                                    <li class="dropdown-header">Hilfreiche Tools</li>
                                    <li><a href="https://elearning.physik.uni-frankfurt.de/local/heartbeat/">Heartbeat</a></li>
                                    <li><a href="https://elearning.physik.uni-frankfurt.de/local/pott-graph/">POTT-Graph</a></li>
                                </ul>
                            </li>
                                <?php
                                    //build navbar-links
                                    for ($i=$section[2];$i<$section[3];$i++) 
                                    {
                                        $name=$spages[$i];
                                        if ($activepage==$name) {
                                            echo ("<li class='active'> <a href='?page=$name'> $name </a> </li>");
                                        } 
                                        else {
                                            echo ("<li> <a href='?page=$name'> $name </a> </li>");
                                        }    
                                    }                        
                                ?>
                        </ul>
                        <ul class="nav navbar-nav pull-right">	
                            <li class="dropdown">
                                <a href="#about" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Über uns <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="mailto:team@elearning.physik.uni-frankfurt.de">Kontakt</a></li>
                                    <li><a href="https://elearning.physik.uni-frankfurt.de/go/impressum">Impressum</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </div>
    
    <!-- include actual site content -->
    <?php
        if (isset($activepage) and in_array($activepage,$spages)) 
        {
            foreach ($pages as $name => $link) 
            {
                if ($activepage == $name)
                {   
                    require $link[0];
                }
            }
        }
        else 
        {
            //defaults to homepage
            require ("pages/index.php");
        }
        
    ?>

    <!-- FOOTER -->
    <div class="container">
        <footer>
            <p class="pull-right"><a href="#">Nach oben</a></p>
            <p>© 2015 PhysikOnline &bull; <a href="mailto:team@elearning.physik.uni-frankfurt.de">Kontakt</a>
            &bull; <a href="https://elearning.physik.uni-frankfurt.de/go/nutzungsvereinbarung">Nutzungsvereinbarungen</a>
            &bull; <a href="https://elearning.physik.uni-frankfurt.de/go/datenschutz">Datenschutz</a>
            &bull; <a href="https://elearning.physik.uni-frankfurt.de/go/impressum">Impressum</a>
        </p>
        </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>
