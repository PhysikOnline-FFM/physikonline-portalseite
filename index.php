<!DOCTYPE html>
<!--
    Bugs: Team-Seite funktioniert nicht richtig, da mit Bootstrap 3.3 die Navbar-Brand nicht richtig aussieht
    
    ToDo: Filter und Profile in Team-Seite
-->

<?php
        //pages in front of dropdown menu
        $mainpages = array("Überblick"        =>array(
													"tpl_file" =>"pages/index.php",
													"link"=>array("title"=>"", "href"=>"/"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"PhysikOnline: Studentisches eLearning der Physik an der Goethe-Universität, Frankfurt")
													),
                           "ILIAS"            =>array(
													"tpl_file" =>"pages/ilias.php",
													"link"=>array("title"=>"", "href"=>"pages/ilias"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"Ilias - was ist das? - PhysikOnline")
													),
                           "POKAL"            =>array(
													"tpl_file" =>"pages/pokal.php",
													"link"=>array("title"=>"", "href"=>"pages/pokal"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"POKAL - PhysikOnline")
													),
                           "RiedbergTV"       =>array(
													"tpl_file" =>"pages/riedbergtv.php",
													"link"=>array("title"=>"", "href"=>"pages/riedbergtv"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"RiedbergTV - PhysikOnline")
													),
                          );
        //pages in dropdown menu                                 
        $menupages = array("URL Shortener"    =>array(
													"tpl_file" =>"pages/tinygu",
													"link"=>array("title"=>"", "href"=>"pages/tinygu"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"TinyGU - PhysikOnline")
													),
                           "POTT"             =>array(
						   							"tpl_file" =>"pages/pott.php",
													"link"=>array("title"=>"", "href"=>"pages/pott"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"POTT - PhysikOnline")
													),
                           "POAK"             =>array(
						   							"tpl_file" =>"pages/poak.php",
													"link"=>array("title"=>"", "href"=>"pages/poak"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"POAK - PhysikOnline")
													),
                           "Podcast Physik"   =>array(
						   							"tpl_file" =>"pages/podcastphysik.php",
													"link"=>array("title"=>"", "href"=>"pages/podcastphysik"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"Die Podcast-Wiki Physik - PhysikOnline")
													),
                           "Uniphi"           =>array(
						   							"tpl_file" =>"pages/uniphi.php",
													"link"=>array("title"=>"", "href"=>"pages/uniphi"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"UniPhi - PhysikOnline")
													),
                           "SageCell"         =>array(
						   							"tpl_file" =>"pages/sagecell.php",
													"link"=>array("title"=>"", "href"=>"pages/sagecell"),
													"head"=>array("keywords"=>"", "description"=>"", "title"=>"SageCell-Server - PhysikOnline")
													),
                          );
        //pages after the dropdown menu             
        $aftermenupages = array("Team"        =>array(
													"link"=>array("pages/team.php"),
													"head"=>array("Das Team von PhysikOnline an der Goethe-Universität")
													),
                               );
              
        $allpages = array_merge($mainpages, $menupages, $aftermenupages);
        $keypages = array_keys(array_change_key_case($allpages,CASE_LOWER));
        //set up active page
        $activepage = isset($_GET["page"]) ? strtolower($_GET["page"]) : strtolower($keypages[0]);
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
            if (isset($activepage) and in_array($activepage,$keypages))
            {
                //get header text
                echo($allpages[$activepage]["head"]["title"]);
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
            <nav class="navbar <?php //echo(in_array($activepage, array_keys($menupages)) ? "navbar-inverse" : "navbar-default") ?> navbar-default navbar-static-top">
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
                            foreach ($mainpages as $name => $link) 
                            {
                                //first one just to get the homepage working
                                if (!isset($activepage) and $name==$keypages[0]) {
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

                            <li class="dropdown <?php echo(in_array($activepage, array_keys($menupages)) ? "active" : "") ?>">
                                <a href="#more" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Weitere Projekte <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-header">Weitere Projekte</li>
                                    <?php
                                        //build navbar-links
                                        foreach ($menupages as $name => $link) {
                                            echo ($activepage==$name ? "<li class='active'> <a href='?page=$name'> $name </a> </li>" : "<li> <a href='?page=$name'> $name </a> </li>");
                                        }                        
                                    ?>
                                    <li class="dropdown-header">Hilfreiche Tools</li>
                                    <li><a href="https://elearning.physik.uni-frankfurt.de/local/heartbeat/">Heartbeat</a></li>
                                    <li><a href="https://elearning.physik.uni-frankfurt.de/local/pott-graph/">POTT-Graph</a></li>
                                </ul>
                            </li>
                                <?php
                                    //build navbar-links
                                    foreach ($aftermenupages as $name => $link) {
                                        echo ($activepage==$name ? "<li class='active'> <a href='?page=$name'> $name </a> </li>" : "<li> <a href='?page=$name'> $name </a> </li>");
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
        if (isset($activepage) and in_array($activepage,$keypages)) {
            foreach ($allpages as $name => $info) {
                if ($activepage == $name) {   
                    require($info["tpl_file"]);
                }
            }
        }
        else {
            //defaults to homepage
            require("pages/index.php");
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
