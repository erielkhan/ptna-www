<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>PTNA - Results</title>
        <meta name="generator" content="PTNA" />
        <meta name="keywords" content="OSM Public Transport PTv2" />
        <meta name="description" content="PTNA - Results of the Analysis of various Networks" />
        <meta name="robots" content="noindex,nofollow" />
        <link rel="stylesheet" href="/css/main.css" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="icon" type="image/png" href="/favicon.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/favicon.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" sizes="any" />
        <?php
            function CreateEntry( $network ) {
                $prefixparts = explode( '-', $network );
                $countrydir  = array_shift( $prefixparts );
                if ( count($prefixparts) > 1 ) {
                    $subdir = array_shift( $prefixparts );
                    $detailsfilename  = '/osm/ptna/work/' . $countrydir . '/' . $subdir . '/' . $network . '-Analysis-details.txt';
                    $diff_filename    = $subdir . '/' . $network . '-Analysis.diff.html';
                } else {
                    $detailsfilename  = '/osm/ptna/work/' . $countrydir . '/' . $network . '-Analysis-details.txt';
                    $diff_filename    = $network . '-Analysis.diff.html';  
                }
                $data_hash = [];
                $data_hash['OLD_OR_NEW'] = 'old';
                if ( file_exists($detailsfilename) ) {
                    $lines = file( $detailsfilename, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES  );
    
                    foreach ( $lines as $line ) {
                        list($key,$value) = explode( '=', $line, 2 );
                        $key              = rtrim(ltrim($key));
                        $data_hash[$key]  = rtrim(ltrim($value));
                    }
                }
                if ( $data_hash['NEW_DATE_UTC'] && $data_hash['NEW_DATE_LOC'] ) {
                    echo '<td data-ref="'.$network.'-datadate" class="results-datadate"><time datetime="'.$data_hash['NEW_DATE_UTC'].'">'.$data_hash['NEW_DATE_LOC'].'</time></td>';
                } else {
                    echo '<td data-ref="'.$network.'-datadate" class="results-datadate">&nbsp;</td>';
                }
                echo "\n                        ";
                if ( $data_hash['OLD_DATE_UTC'] && $data_hash['OLD_DATE_LOC'] && $data_hash['OLD_OR_NEW'] ) {
                    echo '<td data-ref="'.$network.'-analyzed" class="results-analyzed-'.$data_hash['OLD_OR_NEW'].'"><a href="'.$diff_filename.'"><time datetime="'.$data_hash['OLD_DATE_UTC'].'">'.$data_hash['OLD_DATE_LOC'].'</time></a></td>';
                } else {
                    echo '<td data-ref="'.$network.'-analyzed" class="results-analyzed-old">&nbsp;</time></a></td>';
                }
                echo "\n";
            }
        ?>

    </head>
    <body>
      <div id="wrapper">
        <header id="headerblock">
            <div id="headerimg" class="logo">
                <a href="/"><img src="/img/logo.png" alt="logo" /></a>
            </div>
            <div id="headertext">
                <h1><a href="/">PTNA - Public Transport Network Analysis</a></h1>
                <h2>Analyse statique pour OpenStreetMap</h2>
            </div>
            <div id="headernav">
                <a href="/">Home</a> |
                <a href="/contact.html">Contact</a> |
                <a target="_blank" href="https://www.openstreetmap.de/impressum.html">Impressum</a> |
                <a target="_blank" href="https://www.fossgis.de/datenschutzerklaerung">Datenschutzerklärung</a> |
                <a href="/en/index.html" title="english"><img src="/img/GreatBritain16.png" alt="Union Jack" /></a>
                <a href="/de/index.html" title="deutsch"><img src="/img/Germany16.png" alt="deutsche Flagge" /></a>
                <!-- <a href="/fr/index.html" title="français"><img src="/img/France16.png" alt="Tricolore Française" /></a> -->
            </div>
        </header>

        <main id="main" class="results">

            <h2 id="FR"><img src="/img/France32.png" alt="Tricolore Française" /> Des Résultats pour la France</h2>
            <p>
                La première colonne comprend des liens vers les résultats de l'analyse.
            </p>
            <p>
                La colonne "Dernière modification" renvoie aux pages HTML indiquant les différences par rapport aux derniers résultats d'analyse.
                Celles-ci sont colorées, vous pouvez utiliser les boutons de navigation <img class="diff-navigate" src="/img/diff-navigate.png" alt="Navigation"> en bas à droite ou les caractères 'j' (avant) et 'k' (arrière) pour passer de différence á différence.
                Cette colonne comprend la date de la dernière analyse où des changements pertinents sont apparus.
                Les dates plus anciennes signifient qu'il n'y a pas eu de changement dans les résultats.
                Néanmoins, les données ont été analysées comme indiqué dans la colonne "Date de l'analyse".
            </p>

            <table id="networksFR">
                <thead>
                    <tr class="results-tableheaderrow">
                        <th class="results-name">Nom</th>
                        <th class="results-region">Ville / Départment / Région</th>
                        <th class="results-network">Réseau</th>
                        <th class="results-datadate">Date de l'Analyse</th>
                        <th class="results-analyzed">Dernière Modification</th>
                        <th class="results-discussion">Discussion</th>
                        <th class="results-route">Lignes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-Peps-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-Peps-Analysis.html" title="aux résultats">FR-IDF-Peps</a></td>
                        <td data-ref="FR-IDF-Peps-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q12753%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Seine-et-Marne (77)</a> / Île-de-France</td>
                        <td data-ref="FR-IDF-Peps-network" class="results-network"><a href="https://www.transdev-idf.com/r%C3%A9seau-bus-amv/051">Pep's</a></td>
                        <?php CreateEntry("FR-IDF-Peps"); ?>
                        <td data-ref="FR-IDF-Peps-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/Bus_Pep's/Analysis" title="OSM-Wiki">Discussion</a></td>
                        <td data-ref="FR-IDF-Peps-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-Peps/FR-IDF-Peps-Routes.txt" title="GitHub">Pep's lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-aerial-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-aerial-Analysis.html" title="aux résultats">FR-IDF-aerial</a></td>
                        <td data-ref="FR-IDF-aerial-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-aerial-network" class="results-network">Aérial</td>
                        <?php CreateEntry("FR-IDF-aerial"); ?>
                        <td data-ref="FR-IDF-aerial-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-aerial-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-aerial/FR-IDF-aerial-Routes.txt" title="GitHub">Aérial lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-albatrans-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-albatrans-Analysis.html" title="aux résultats">FR-IDF-albatrans</a></td>
                        <td data-ref="FR-IDF-albatrans-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-albatrans-network" class="results-network">Albatrans</td>
                        <?php CreateEntry("FR-IDF-albatrans"); ?>
                        <td data-ref="FR-IDF-albatrans-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-albatrans-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-albatrans/FR-IDF-albatrans-Routes.txt" title="GitHub">Albatrans lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-apolo-7-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-apolo-7-Analysis.html" title="aux résultats">FR-IDF-apolo-7</a></td>
                        <td data-ref="FR-IDF-apolo-7-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-apolo-7-network" class="results-network">Apolo 7</td>
                        <?php CreateEntry("FR-IDF-apolo-7"); ?>
                        <td data-ref="FR-IDF-apolo-7-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-apolo-7-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-apolo-7/FR-IDF-apolo-7-Routes.txt" title="GitHub">Apolo 7 lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-arlequin-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-arlequin-Analysis.html" title="aux résultats">FR-IDF-arlequin</a></td>
                        <td data-ref="FR-IDF-arlequin-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-arlequin-network" class="results-network">Arlequin</td>
                        <?php CreateEntry("FR-IDF-arlequin"); ?>
                        <td data-ref="FR-IDF-arlequin-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-arlequin-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-arlequin/FR-IDF-arlequin-Routes.txt" title="GitHub">Arlequin lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-bus-en-seine-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-bus-en-seine-Analysis.html" title="aux résultats">FR-IDF-bus-en-seine</a></td>
                        <td data-ref="FR-IDF-bus-en-seine-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-bus-en-seine-network" class="results-network">Bus en Seine</td>
                        <?php CreateEntry("FR-IDF-bus-en-seine"); ?>
                        <td data-ref="FR-IDF-bus-en-seine-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-bus-en-seine-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-bus-en-seine/FR-IDF-bus-en-seine-Routes.txt" title="GitHub">Bus en Seine lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-busval-d-oise-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-busval-d-oise-Analysis.html" title="aux résultats">FR-IDF-busval-d-oise</a></td>
                        <td data-ref="FR-IDF-busval-d-oise-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-busval-d-oise-network" class="results-network">Busval d'Oise</td>
                        <?php CreateEntry("FR-IDF-busval-d-oise"); ?>
                        <td data-ref="FR-IDF-busval-d-oise-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-busval-d-oise-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-busval-d-oise/FR-IDF-busval-d-oise-Routes.txt" title="GitHub">Busval d'Oise lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-cars-moreau-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-cars-moreau-Analysis.html" title="aux résultats">FR-IDF-cars-moreau</a></td>
                        <td data-ref="FR-IDF-cars-moreau-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-cars-moreau-network" class="results-network">CARS MOREAU</td>
                        <?php CreateEntry("FR-IDF-cars-moreau"); ?>
                        <td data-ref="FR-IDF-cars-moreau-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-cars-moreau-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-cars-moreau/FR-IDF-cars-moreau-Routes.txt" title="GitHub">CARS MOREAU lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-ceat-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-ceat-Analysis.html" title="aux résultats">FR-IDF-ceat</a></td>
                        <td data-ref="FR-IDF-ceat-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-ceat-network" class="results-network">CEAT</td>
                        <?php CreateEntry("FR-IDF-ceat"); ?>
                        <td data-ref="FR-IDF-ceat-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-ceat-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-ceat/FR-IDF-ceat-Routes.txt" title="GitHub">CEAT lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-cif-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-cif-Analysis.html" title="aux résultats">FR-IDF-cif</a></td>
                        <td data-ref="FR-IDF-cif-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-cif-network" class="results-network">CIF</td>
                        <?php CreateEntry("FR-IDF-cif"); ?>
                        <td data-ref="FR-IDF-cif-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-cif-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-cif/FR-IDF-cif-Routes.txt" title="GitHub">CIF lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-com-bus-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-com-bus-Analysis.html" title="aux résultats">FR-IDF-com-bus</a></td>
                        <td data-ref="FR-IDF-com-bus-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-com-bus-network" class="results-network">Com'Bus</td>
                        <?php CreateEntry("FR-IDF-com-bus"); ?>
                        <td data-ref="FR-IDF-com-bus-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-com-bus-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-com-bus/FR-IDF-com-bus-Routes.txt" title="GitHub">Com'Bus lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-comete-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-comete-Analysis.html" title="aux résultats">FR-IDF-comete</a></td>
                        <td data-ref="FR-IDF-comete-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-comete-network" class="results-network">Comète</td>
                        <?php CreateEntry("FR-IDF-comete"); ?>
                        <td data-ref="FR-IDF-comete-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-comete-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-comete/FR-IDF-comete-Routes.txt" title="GitHub">Comète lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-cso-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-cso-Analysis.html" title="aux résultats">FR-IDF-cso</a></td>
                        <td data-ref="FR-IDF-cso-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-cso-network" class="results-network">CSO</td>
                        <?php CreateEntry("FR-IDF-cso"); ?>
                        <td data-ref="FR-IDF-cso-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-cso-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-cso/FR-IDF-cso-Routes.txt" title="GitHub">CSO lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-entre-seine-et-foret-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-entre-seine-et-foret-Analysis.html" title="aux résultats">FR-IDF-entre-seine-et-foret</a></td>
                        <td data-ref="FR-IDF-entre-seine-et-foret-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-entre-seine-et-foret-network" class="results-network">Entre Seine et Forêt</td>
                        <?php CreateEntry("FR-IDF-entre-seine-et-foret"); ?>
                        <td data-ref="FR-IDF-entre-seine-et-foret-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-entre-seine-et-foret-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-entre-seine-et-foret/FR-IDF-entre-seine-et-foret-Routes.txt" title="GitHub">Entre Seine et Forêt lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-fileo-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-fileo-Analysis.html" title="aux résultats">FR-IDF-fileo</a></td>
                        <td data-ref="FR-IDF-fileo-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-fileo-network" class="results-network">Filéo</td>
                        <?php CreateEntry("FR-IDF-fileo"); ?>
                        <td data-ref="FR-IDF-fileo-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-fileo-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-fileo/FR-IDF-fileo-Routes.txt" title="GitHub">Filéo lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-goelys-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-goelys-Analysis.html" title="aux résultats">FR-IDF-goelys</a></td>
                        <td data-ref="FR-IDF-goelys-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-goelys-network" class="results-network">Goëlys</td>
                        <?php CreateEntry("FR-IDF-goelys"); ?>
                        <td data-ref="FR-IDF-goelys-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-goelys-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-goelys/FR-IDF-goelys-Routes.txt" title="GitHub">Goëlys lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-houdanais-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-houdanais-Analysis.html" title="aux résultats">FR-IDF-houdanais</a></td>
                        <td data-ref="FR-IDF-houdanais-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-houdanais-network" class="results-network">Houdanais</td>
                        <?php CreateEntry("FR-IDF-houdanais"); ?>
                        <td data-ref="FR-IDF-houdanais-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-houdanais-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-houdanais/FR-IDF-houdanais-Routes.txt" title="GitHub">Houdanais lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-hourtoule-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-hourtoule-Analysis.html" title="aux résultats">FR-IDF-hourtoule</a></td>
                        <td data-ref="FR-IDF-hourtoule-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-hourtoule-network" class="results-network">HOURTOULE</td>
                        <?php CreateEntry("FR-IDF-hourtoule"); ?>
                        <td data-ref="FR-IDF-hourtoule-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-hourtoule-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-hourtoule/FR-IDF-hourtoule-Routes.txt" title="GitHub">HOURTOULE lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-lacroix-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-lacroix-Analysis.html" title="aux résultats">FR-IDF-lacroix</a></td>
                        <td data-ref="FR-IDF-lacroix-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-lacroix-network" class="results-network">LACROIX</td>
                        <?php CreateEntry("FR-IDF-lacroix"); ?>
                        <td data-ref="FR-IDF-lacroix-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-lacroix-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-lacroix/FR-IDF-lacroix-Routes.txt" title="GitHub">LACROIX lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-les-cars-bleus-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-les-cars-bleus-Analysis.html" title="aux résultats">FR-IDF-les-cars-bleus</a></td>
                        <td data-ref="FR-IDF-les-cars-bleus-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-les-cars-bleus-network" class="results-network">LES CARS BLEUS</td>
                        <?php CreateEntry("FR-IDF-les-cars-bleus"); ?>
                        <td data-ref="FR-IDF-les-cars-bleus-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-les-cars-bleus-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-les-cars-bleus/FR-IDF-les-cars-bleus-Routes.txt" title="GitHub">LES CARS BLEUS lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-melibus-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-melibus-Analysis.html" title="aux résultats">FR-IDF-melibus</a></td>
                        <td data-ref="FR-IDF-melibus-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-melibus-network" class="results-network">MELIBUS</td>
                        <?php CreateEntry("FR-IDF-melibus"); ?>
                        <td data-ref="FR-IDF-melibus-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-melibus-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-melibus/FR-IDF-melibus-Routes.txt" title="GitHub">MELIBUS lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-mobicaps-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-mobicaps-Analysis.html" title="aux résultats">FR-IDF-mobicaps</a></td>
                        <td data-ref="FR-IDF-mobicaps-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-mobicaps-network" class="results-network">Mobicaps</td>
                        <?php CreateEntry("FR-IDF-mobicaps"); ?>
                        <td data-ref="FR-IDF-mobicaps-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-mobicaps-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-mobicaps/FR-IDF-mobicaps-Routes.txt" title="GitHub">Mobicaps lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-noctilien-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-noctilien-Analysis.html" title="aux résultats">FR-IDF-noctilien</a></td>
                        <td data-ref="FR-IDF-noctilien-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-noctilien-network" class="results-network">Noctilien</td>
                        <?php CreateEntry("FR-IDF-noctilien"); ?>
                        <td data-ref="FR-IDF-noctilien-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-noctilien-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-noctilien/FR-IDF-noctilien-Routes.txt" title="GitHub">Noctilien lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-ormont-transport-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-ormont-transport-Analysis.html" title="aux résultats">FR-IDF-ormont-transport</a></td>
                        <td data-ref="FR-IDF-ormont-transport-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-ormont-transport-network" class="results-network">ORMONT TRANSPORT</td>
                        <?php CreateEntry("FR-IDF-ormont-transport"); ?>
                        <td data-ref="FR-IDF-ormont-transport-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-ormont-transport-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-ormont-transport/FR-IDF-ormont-transport-Routes.txt" title="GitHub">ORMONT TRANSPORT lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-paladin-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-paladin-Analysis.html" title="aux résultats">FR-IDF-paladin</a></td>
                        <td data-ref="FR-IDF-paladin-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-paladin-network" class="results-network">Paladin</td>
                        <?php CreateEntry("FR-IDF-paladin"); ?>
                        <td data-ref="FR-IDF-paladin-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-paladin-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-paladin/FR-IDF-paladin-Routes.txt" title="GitHub">Paladin lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-parisis-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-parisis-Analysis.html" title="aux résultats">FR-IDF-parisis</a></td>
                        <td data-ref="FR-IDF-parisis-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-parisis-network" class="results-network">Parisis</td>
                         <?php CreateEntry("FR-IDF-parisis"); ?>
                        <td data-ref="FR-IDF-parisis-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-parisis-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-parisis/FR-IDF-parisis-Routes.txt" title="GitHub">Parisis lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-pays-crecois-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-pays-crecois-Analysis.html" title="aux résultats">FR-IDF-pays-crecois</a></td>
                        <td data-ref="FR-IDF-pays-crecois-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-pays-crecois-network" class="results-network">Pays Créçois</td>
                        <?php CreateEntry("FR-IDF-pays-crecois"); ?>
                        <td data-ref="FR-IDF-pays-crecois-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-pays-crecois-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-pays-crecois/FR-IDF-pays-crecois-Routes.txt" title="GitHub">Pays Créçois lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-pays-de-l-ourcq-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-pays-de-l-ourcq-Analysis.html" title="aux résultats">FR-IDF-pays-de-l-ourcq</a></td>
                        <td data-ref="FR-IDF-pays-de-l-ourcq-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-pays-de-l-ourcq-network" class="results-network">Pays de l'Ourcq</td>
                        <?php CreateEntry("FR-IDF-pays-de-l-ourcq"); ?>
                        <td data-ref="FR-IDF-pays-de-l-ourcq-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-pays-de-l-ourcq-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-pays-de-l-ourcq/FR-IDF-pays-de-l-ourcq-Routes.txt" title="GitHub">Pays de l'Ourcq lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-pays-de-meaux-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-pays-de-meaux-Analysis.html" title="aux résultats">FR-IDF-pays-de-meaux</a></td>
                        <td data-ref="FR-IDF-pays-de-meaux-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-pays-de-meaux-network" class="results-network">Pays de Meaux</td>
                        <?php CreateEntry("FR-IDF-pays-de-meaux"); ?>
                        <td data-ref="FR-IDF-pays-de-meaux-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-pays-de-meaux-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-pays-de-meaux/FR-IDF-pays-de-meaux-Routes.txt" title="GitHub">Pays de Meaux lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-pays-fertois-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-pays-fertois-Analysis.html" title="aux résultats">FR-IDF-pays-fertois</a></td>
                        <td data-ref="FR-IDF-pays-fertois-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-pays-fertois-network" class="results-network">Pays Fertois</td>
                        <?php CreateEntry("FR-IDF-pays-fertois"); ?>
                        <td data-ref="FR-IDF-pays-fertois-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-pays-fertois-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-pays-fertois/FR-IDF-pays-fertois-Routes.txt" title="GitHub">Pays Fertois lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-phebus-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-phebus-Analysis.html" title="aux résultats">FR-IDF-phebus</a></td>
                        <td data-ref="FR-IDF-phebus-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-phebus-network" class="results-network">Phébus</td>
                        <?php CreateEntry("FR-IDF-phebus"); ?>
                        <td data-ref="FR-IDF-phebus-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-phebus-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-phebus/FR-IDF-phebus-Routes.txt" title="GitHub">Phébus lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-poissy-aval-deux-rives-de-seine-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-poissy-aval-deux-rives-de-seine-Analysis.html" title="aux résultats">FR-IDF-poissy-aval-deux-rives-de-seine</a></td>
                        <td data-ref="FR-IDF-poissy-aval-deux-rives-de-seine-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-poissy-aval-deux-rives-de-seine-network" class="results-network">Poissy Aval - Deux Rives de Seine</td>
                        <?php CreateEntry("FR-IDF-poissy-aval-deux-rives-de-seine"); ?>
                        <td data-ref="FR-IDF-poissy-aval-deux-rives-de-seine-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-poissy-aval-deux-rives-de-seine-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-poissy-aval-deux-rives-de-seine/FR-IDF-poissy-aval-deux-rives-de-seine-Routes.txt" title="GitHub">Poissy Aval - Deux Rives de Seine lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-procars-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-procars-Analysis.html" title="aux résultats">FR-IDF-procars</a></td>
                        <td data-ref="FR-IDF-procars-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-procars-network" class="results-network">PROCARS</td>
                        <?php CreateEntry("FR-IDF-procars"); ?>
                        <td data-ref="FR-IDF-procars-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-procars-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-procars/FR-IDF-procars-Routes.txt" title="GitHub">PROCARS lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-r-bus-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-r-bus-Analysis.html" title="aux résultats">FR-IDF-r-bus</a></td>
                        <td data-ref="FR-IDF-r-bus-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-r-bus-network" class="results-network">R'bus</td>
                        <?php CreateEntry("FR-IDF-r-bus"); ?>
                        <td data-ref="FR-IDF-r-bus-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-r-bus-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-r-bus/FR-IDF-r-bus-Routes.txt" title="GitHub">R'bus lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-rambouillet-interurbain-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-rambouillet-interurbain-Analysis.html" title="aux résultats">FR-IDF-rambouillet-interurbain</a></td>
                        <td data-ref="FR-IDF-rambouillet-interurbain-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-rambouillet-interurbain-network" class="results-network">Rambouillet Interurbain</td>
                        <?php CreateEntry("FR-IDF-rambouillet-interurbain"); ?>
                        <td data-ref="FR-IDF-rambouillet-interurbain-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-rambouillet-interurbain-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-rambouillet-interurbain/FR-IDF-rambouillet-interurbain-Routes.txt" title="GitHub">Rambouillet Interurbain lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-reseau-du-canton-de-perthes-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-reseau-du-canton-de-perthes-Analysis.html" title="aux résultats">FR-IDF-reseau-du-canton-de-perthes</a></td>
                        <td data-ref="FR-IDF-reseau-du-canton-de-perthes-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-reseau-du-canton-de-perthes-network" class="results-network">Réseau du Canton de Perthes</td>
                        <?php CreateEntry("FR-IDF-reseau-du-canton-de-perthes"); ?>
                        <td data-ref="FR-IDF-reseau-du-canton-de-perthes-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-reseau-du-canton-de-perthes-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-reseau-du-canton-de-perthes/FR-IDF-reseau-du-canton-de-perthes-Routes.txt" title="GitHub">Réseau du Canton de Perthes lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-savac-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-savac-Analysis.html" title="aux résultats">FR-IDF-savac</a></td>
                        <td data-ref="FR-IDF-savac-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-savac-network" class="results-network">SAVAC</td>
                        <?php CreateEntry("FR-IDF-savac"); ?>
                        <td data-ref="FR-IDF-savac-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-savac-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-savac/FR-IDF-savac-Routes.txt" title="GitHub">SAVAC lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-seine-et-marne-express-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-seine-et-marne-express-Analysis.html" title="aux résultats">FR-IDF-seine-et-marne-express</a></td>
                        <td data-ref="FR-IDF-seine-et-marne-express-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-seine-et-marne-express-network" class="results-network">Seine et Marne Express</td>
                        <?php CreateEntry("FR-IDF-seine-et-marne-express"); ?>
                        <td data-ref="FR-IDF-seine-et-marne-express-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-seine-et-marne-express-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-seine-et-marne-express/FR-IDF-seine-et-marne-express-Routes.txt" title="GitHub">Seine et Marne Express lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-seine-saint-denis-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-seine-saint-denis-Analysis.html" title="aux résultats">FR-IDF-seine-saint-denis</a></td>
                        <td data-ref="FR-IDF-seine-saint-denis-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-seine-saint-denis-network" class="results-network">Seine-Saint-Denis</td>
                        <?php CreateEntry("FR-IDF-seine-saint-denis"); ?>
                        <td data-ref="FR-IDF-seine-saint-denis-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-seine-saint-denis-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-seine-saint-denis/FR-IDF-seine-saint-denis-Routes.txt" title="GitHub">Seine-Saint-Denis lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-seine-senart-bus-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-seine-senart-bus-Analysis.html" title="aux résultats">FR-IDF-seine-senart-bus</a></td>
                        <td data-ref="FR-IDF-seine-senart-bus-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-seine-senart-bus-network" class="results-network">Seine Sénart Bus</td>
                        <?php CreateEntry("FR-IDF-seine-senart-bus"); ?>
                        <td data-ref="FR-IDF-seine-senart-bus-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-seine-senart-bus-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-seine-senart-bus/FR-IDF-seine-senart-bus-Routes.txt" title="GitHub">Seine Sénart Bus lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-senart-bus-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-senart-bus-Analysis.html" title="aux résultats">FR-IDF-senart-bus</a></td>
                        <td data-ref="FR-IDF-senart-bus-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-senart-bus-network" class="results-network">Sénart-Bus</td>
                         <?php CreateEntry("FR-IDF-senart-bus"); ?>
                        <td data-ref="FR-IDF-senart-bus-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-senart-bus-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-senart-bus/FR-IDF-senart-bus-Routes.txt" title="GitHub">Sénart-Bus lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-situs-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-situs-Analysis.html" title="aux résultats">FR-IDF-situs</a></td>
                        <td data-ref="FR-IDF-situs-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-situs-network" class="results-network">SITUS</td>
                        <?php CreateEntry("FR-IDF-situs"); ?>
                        <td data-ref="FR-IDF-situs-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-situs-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-situs/FR-IDF-situs-Routes.txt" title="GitHub">SITUS lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-siyonne-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-siyonne-Analysis.html" title="aux résultats">FR-IDF-siyonne</a></td>
                        <td data-ref="FR-IDF-siyonne-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-siyonne-network" class="results-network">Siyonne</td>
                        <?php CreateEntry("FR-IDF-siyonne"); ?>
                        <td data-ref="FR-IDF-siyonne-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-siyonne-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-siyonne/FR-IDF-siyonne-Routes.txt" title="GitHub">Siyonne lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-sol-r-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-sol-r-Analysis.html" title="aux résultats">FR-IDF-sol-r</a></td>
                        <td data-ref="FR-IDF-sol-r-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-sol-r-network" class="results-network">Sol'R</td>
                        <?php CreateEntry("FR-IDF-sol-r"); ?>
                        <td data-ref="FR-IDF-sol-r-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-sol-r-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-sol-r/FR-IDF-sol-r-Routes.txt" title="GitHub">Sol'R lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-sqybus-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-sqybus-Analysis.html" title="aux résultats">FR-IDF-sqybus</a></td>
                        <td data-ref="FR-IDF-sqybus-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-sqybus-network" class="results-network">SQYBUS</td>
                        <?php CreateEntry("FR-IDF-sqybus"); ?>
                        <td data-ref="FR-IDF-sqybus-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-sqybus-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-sqybus/FR-IDF-sqybus-Routes.txt" title="GitHub">SQYBUS lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-still-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-still-Analysis.html" title="aux résultats">FR-IDF-still</a></td>
                        <td data-ref="FR-IDF-still-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-still-network" class="results-network">STILL</td>
                        <?php CreateEntry("FR-IDF-still"); ?>
                        <td data-ref="FR-IDF-still-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-still-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-still/FR-IDF-still-Routes.txt" title="GitHub">STILL lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-stivo-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-stivo-Analysis.html" title="aux résultats">FR-IDF-stivo</a></td>
                        <td data-ref="FR-IDF-stivo-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-stivo-network" class="results-network">STIVO</td>
                        <?php CreateEntry("FR-IDF-stivo"); ?>
                        <td data-ref="FR-IDF-stivo-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-stivo-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-stivo/FR-IDF-stivo-Routes.txt" title="GitHub">STIVO lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-tam-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-tam-Analysis.html" title="aux résultats">FR-IDF-tam</a></td>
                        <td data-ref="FR-IDF-tam-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-tam-network" class="results-network">TAM</td>
                        <?php CreateEntry("FR-IDF-tam"); ?>
                        <td data-ref="FR-IDF-tam-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-tam-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-tam/FR-IDF-tam-Routes.txt" title="GitHub">TAM lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-tice-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-tice-Analysis.html" title="aux résultats">FR-IDF-tice</a></td>
                        <td data-ref="FR-IDF-tice-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-tice-network" class="results-network">TICE</td>
                        <?php CreateEntry("FR-IDF-tice"); ?>
                        <td data-ref="FR-IDF-tice-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-tice-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-tice/FR-IDF-tice-Routes.txt" title="GitHub">TICE lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-tramy-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-tramy-Analysis.html" title="aux résultats">FR-IDF-tramy</a></td>
                        <td data-ref="FR-IDF-tramy-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-tramy-network" class="results-network">TRAMY</td>
                        <?php CreateEntry("FR-IDF-tramy"); ?>
                        <td data-ref="FR-IDF-tramy-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-tramy-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-tramy/FR-IDF-tramy-Routes.txt" title="GitHub">TRAMY lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-trans-essonne-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-trans-essonne-Analysis.html" title="aux résultats">FR-IDF-trans-essonne</a></td>
                        <td data-ref="FR-IDF-trans-essonne-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-trans-essonne-network" class="results-network">Trans'Essonne</td>
                        <?php CreateEntry("FR-IDF-trans-essonne"); ?>
                        <td data-ref="FR-IDF-trans-essonne-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-trans-essonne-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-trans-essonne/FR-IDF-trans-essonne-Routes.txt" title="GitHub">Trans'Essonne lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-transdev-ile-de-france-conflans-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-transdev-ile-de-france-conflans-Analysis.html" title="aux résultats">FR-IDF-transdev-ile-de-france-conflans</a></td>
                        <td data-ref="FR-IDF-transdev-ile-de-france-conflans-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-transdev-ile-de-france-conflans-network" class="results-network">Transdev Ile-de-France Conflans</td>
                        <?php CreateEntry("FR-IDF-transdev-ile-de-france-conflans"); ?>
                        <td data-ref="FR-IDF-transdev-ile-de-france-conflans-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-transdev-ile-de-france-conflans-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-transdev-ile-de-france-conflans/FR-IDF-transdev-ile-de-france-conflans-Routes.txt" title="GitHub">Transdev Ile-de-France Conflans lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-transports-daniel-meyer-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-transports-daniel-meyer-Analysis.html" title="aux résultats">FR-IDF-transports-daniel-meyer</a></td>
                        <td data-ref="FR-IDF-transports-daniel-meyer-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-transports-daniel-meyer-network" class="results-network">TRANSPORTS DANIEL MEYER</td>
                        <?php CreateEntry("FR-IDF-transports-daniel-meyer"); ?>
                        <td data-ref="FR-IDF-transports-daniel-meyer-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-transports-daniel-meyer-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-transports-daniel-meyer/FR-IDF-transports-daniel-meyer-Routes.txt" title="GitHub">TRANSPORTS DANIEL MEYER lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-val-de-seine-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-val-de-seine-Analysis.html" title="aux résultats">FR-IDF-val-de-seine</a></td>
                        <td data-ref="FR-IDF-val-de-seine-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-val-de-seine-network" class="results-network">Val de Seine</td>
                        <?php CreateEntry("FR-IDF-val-de-seine"); ?>
                        <td data-ref="FR-IDF-val-de-seine-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-val-de-seine-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-val-de-seine/FR-IDF-val-de-seine-Routes.txt" title="GitHub">Val de Seine lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-vybus-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-vybus-Analysis.html" title="aux résultats">FR-IDF-vybus</a></td>
                        <td data-ref="FR-IDF-vybus-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-vybus-network" class="results-network">VyBus</td>
                        <?php CreateEntry("FR-IDF-vybus"); ?>
                        <td data-ref="FR-IDF-vybus-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-vybus-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-vybus/FR-IDF-vybus-Routes.txt" title="GitHub">VyBus lignes</a></td>
                    </tr>
                    <tr class="results-tablerow">
                        <td data-ref="FR-IDF-yerres-name" class="results-name"><a href="/results/FR/IDF/FR-IDF-yerres-Analysis.html" title="aux résultats">FR-IDF-yerres</a></td>
                        <td data-ref="FR-IDF-yerres-region" class="results-region"><a href="http://overpass-turbo.eu/map.html?Q=%0A%5Bout%3Ajson%5D%5Btimeout%3A25%5D%3B%0A%0A(%0A%0A%20%20relation%5B%22wikidata%22%3D%22Q13917%22%5D%3B%0A)%3B%0Aout%20body%3B%0A%3E%3B%0Aout%20skel%20qt%3B%7B%7Bdata%3Aoverpass%2Cserver%3D%2F%2Foverpass.openstreetmap.fr%2Fapi%2F%7D%7D" title="voir sur map OSM">Île-de-France</a></td>
                        <td data-ref="FR-IDF-yerres-network" class="results-network">Yerres</td>
                        <?php CreateEntry("FR-IDF-yerres"); ?>
                        <td data-ref="FR-IDF-yerres-discussion" class="results-discussion"><a href="https://wiki.openstreetmap.org/wiki/Talk:WikiProject_France/xxx/Analysis" title="OSM-Wiki">en préparation</a></td>
                        <td data-ref="FR-IDF-yerres-route" class="results-route"><a href="https://github.com/osm-ToniE/ptna-networks/raw/master/FR-IDF-yerres/FR-IDF-yerres-Routes.txt" title="GitHub">Yerres lignes</a></td>
                    </tr>
                </tbody>
            </table>

        </main> <!-- main -->

        <hr />

        <footer id="footer">
            <p>
                Toutes les données géographiques <a href="https://www.openstreetmap.org/copyright"> © OpenStreetMap contributors </a>.
            </p>
            <p>
                Ce programme est un logiciel libre: vous pouvez le redistribuer et / ou le modifier selon les termes de la <a href="https://www.gnu.org/licenses/gpl.html"> LICENCE PUBLIQUE GÉNÉRALE GNU, Version 3, 29 juin 2007 </a> telle que publiée par la Free Software Foundation, version 3 de la licence ou (à votre choix) toute version ultérieure.
                Obtenez le code source via <a href="https://github.com/osm-ToniE"> GitHub </a>.
            </p>
            <p>
                Cette page a été traduite avec l'aide de Google translate. Les commentaires pour améliorer la traduction sont les bienvenus.
            </p>
        </footer>

      </div> <!-- wrapper -->
    </body>
</html>

