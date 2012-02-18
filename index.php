<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js" type="text/javascript"></script>
        
        <!-- Fancybox -->
        <script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
        
        <!-- Eigene JS Dateien -->
        <script src="scripts/utils.js"></script>
        <script src="scripts/kochjobs.js"></script>
    </head>
    <body>
        
        <div id="wrapper">
            <div id="header">
                <img src="../web/images/chef.png" id="logo_pic">
                <a href="javascript:void(0)" id="logo" class="link inactive">kochjobs.ch</a>
                <a href="javascript:void(0)" id="searchLink" class="link active" title="suchen">Suchen</a>
                <a href="javascript:void(0)" id="insertLink" class="link inactive" title="inserieren">Inserieren</a>
                <a href="javascript:void(0)" id="adviseLink" class="link inactive" title="ratgeber">Ratgeber</a>
                <a href="javascript:void(0)" id="contactLink" class="link inactive" title="kontakt">Kontakt</a>
            </div>
            <div id="content">
            <div id="suchen" title="suchen">
                <table id="jobSearchTable" title="jobSearchTable">
                    <tr>
                        <td>
                            <select id="jobArea" title="jobArea">
                                <option value="wo">Wo?</option>
                                <option value="schweiz">Ganze Schweiz</option>
                                <option value="aargau">Aargau</option>
                                <option value="appenzell">Appenzell</option>
                                <option value="basel">Basel</option>
                                <option value="bern">Bern</option>
                                <option value="freiburg">Freiburg</option>
                                <option value="genf">Genf</option>
                                <option value="glarus">Glarus</option>
                                <option value="graubünden">Graubünden</option>
                                <option value="jura">Jura</option>
                                <option value="luzern">Luzern</option>
                                <option value="neuenburg">Neuenburg</option>
                                <option value="nidwalden">Nidwalden</option>
                                <option value="obwalden">Obwalden</option>
                                <option value="schwyz">Schwyz</option>
                                <option value="schaffhausen">Schauffhausen</option>
                                <option value="solothurn">Solothurn</option>
                                <option value="stgallen">St. Gallen</option>
                                <option value="tessin">Tessin</option>
                                <option value="thurgau">Thurgau</option>
                                <option value="uri">Uri</option>
                                <option value="waadt">Waadt</option>
                                <option value="wallis">Wallis</option>
                                <option value="zug">Zug</option>
                                <option value="zurich">Zürich</option>
                            </select>
                        <td>     
                        <td>
                            <select id="jobSpecification" title="jobSpecification">
                                <option value="was">Was?</option>
                                <option value="alleJobs">Alle Jobs</option>
                                <option value="lehre">Lehre</option>
                                <option value="commis">Commis de Cuisine</option>
                                <option value="chefDePartie">Chef de Partie</option>
                                <option value="sousChef">Sous Chef</option>
                                <option value="chefDeCuisine">Chef de Cuisine</option>
                            </select>
                        <td>
                        <td><!-- <input type="submit" id="jobSearchButton" value="Job Suchen"> -->
                            <button id="jobSearchButton">Job Suchen</button>
                        </td>
                    </tr>
                </table>
            </div>
                <hr id="hrAfterSearch" title="hrAfterSearch" />
                <div id="suchResultate" title="suchResultate">
                    Such-Resultate: <span id ="searchResults"></span>
                    <ul id="jobList">
                        
                    </ul>
                </div>
            </div>
            <div id="footer">
                Footer
            </div>
        </div>
    </body>
</html>
