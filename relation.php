<!DOCTYPE html>
<?php
    $lang     = ( isset($_GET['lang']) && is_dir('./'.$_GET['lang']) ) ? $_GET['lang'] : 'en';
    $inc_lang = './' . $lang . '/';
?>
<html lang="<?php echo $lang; ?>">

<?php $title="OSM Relation"; include $inc_lang.'html-head.inc'; ?>

    <body>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
      <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

      <script src="/script/relation.js"></script>

      <div id="wrapper">

<?php include $inc_lang.'header.inc' ?>

        <main id="main" class="results">

            <div id="relationmap"></div>
            <div class="relationtables">
                <h3 id ="osm-relation">OSM Relation</h3>

<?php if ( $lang == 'de' ) { ?>
                <span id="progress_section">Download: <progress id="download" value=0 max=2000></progress> <span id="download_text">0</span> ms /
                                            Analyse:  <progress id="analysis" value=0 max=2000></progress> <span id="analysis_text">0</span> ms
                </span>

                <span id="beta" class="attention" style="font-weight: 1000;font-size:1.2em;">BETA: Möglicherweise sind nicht alle Mitglieder der Relation auf der Karte angezeigt.</span>

                <p>
                    Diese Analyse konzentriert sich hauptsächlich auf (PTv2) "route" Relationen für Öffentlichen Nahverkehr.<br />
                    Möglicherweise werden auch für andere Arten von Relationen brauchbare Details aufgezeigt, es gibt aber keine Garantie.
                </p>
<?php } elseif ( $lang == 'fr' ) { ?>
                <span id="progress_section">Download: <progress id="download" value=0 max=2000></progress> <span id="download_text">0</span> ms /
                                            Analysis: <progress id="analysis" value=0 max=2000></progress> <span id="analysis_text">0</span> ms
                </span>

                <span id="beta" class="attention" style="font-weight: 1000;font-size:1.2em;">BETA : il est possible que certains membres de la relation ne soient pas affichés sur la carte.</span>

                <p>
					Cette analyse se concentre principalement sur les relations "route" (PTv2) de transports publics.<br />
					Il est possible que celle-ci fonctionne avec d'autres types de relation mais sans garantie.
                </p>
<?php } else { ?>
                <span id="progress_section">Download: <progress id="download" value=0 max=2000></progress> <span id="download_text">0</span> ms /
                                            Analysis: <progress id="analysis" value=0 max=2000></progress> <span id="analysis_text">0</span> ms
                </span>

                <span id="beta" class="attention" style="font-weight: 1000;font-size:1.2em;">BETA: Possibly not all members of the relation are shown on the map.</span>

                <p>
                    This analysis focuses mainly on (PTv2) "route" relations for public transport.<br />
                    Nevertheless, useful details may also be shown for other types of relations, but there is no guarantee.
                </p>
<?php } ?>
                <section class="tabbing" id="tbg_blindtext">
                    <input type="radio" id="tbg_blindtext_0" name="tbg_blindtext" class="hackbox" checked>
                    <div class="tabcontent">
                        <ul class="tabs">
                            <li><label for="tbg_blindtext_0" class="tab_active">Details</label></li>
                            <li><label for="tbg_blindtext_1" class="platforms_stops">Platforms</label></li>
                            <li><label for="tbg_blindtext_2" class="platforms_stops">Stops</label></li>
                            <li><label for="tbg_blindtext_3">Ways</label></li>
                            <li><label for="tbg_blindtext_4">Others</label></li>
                        </ul>
                        <div class="tableFixHead">
                            <table class="relationtable">
                                <thead class="results-tableheaderrow">
                                    <tr>
                                        <th class="results-name">Key</th>
                                        <th class="results-name">Value</th>
                                    </tr>
                                </thead>
                                <tbody id="relation-values" class="results-tablerow">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="radio" id="tbg_blindtext_1" name="tbg_blindtext" class="hackbox">
                    <div class="tabcontent">
                        <ul class="tabs">
                            <li><label for="tbg_blindtext_0">Details</label></li>
                            <li><label for="tbg_blindtext_1" class="tab_active platforms_stops">Platforms</label></li>
                            <li><label for="tbg_blindtext_2" class="platforms_stops">Stops</label></li>
                            <li><label for="tbg_blindtext_3">Ways</label></li>
                            <li><label for="tbg_blindtext_4">Others</label></li>
                        </ul>
                        <div class="tableFixHead">
                            <table class="relationtable">
                                <thead class="results-tableheaderrow">
                                    <tr>
                                        <th class="results-number" style="width: 2.3em">#</th>
                                        <th class="results-number" style="width: 5em">Member #</th>
                                        <th class="results-name">Role</th>
                                        <th class="results-name">Name / Ref / Description</th>
                                        <th class="results-name">ID</th>
                                    </tr>
                                </thead>
                                <tbody id="platform-members" class="results-tablerow">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="radio" id="tbg_blindtext_2" name="tbg_blindtext" class="hackbox">
                    <div class="tabcontent">
                        <ul class="tabs">
                          <li><label for="tbg_blindtext_0">Details</label></li>
                          <li><label for="tbg_blindtext_1" class="platforms_stops">Platforms</label></li>
                          <li><label for="tbg_blindtext_2" class="tab_active platforms_stops">Stops</label></li>
                          <li><label for="tbg_blindtext_3">Ways</label></li>
                          <li><label for="tbg_blindtext_4">Others</label></li>
                        </ul>
                        <div class="tableFixHead">
                            <table class="relationtable">
                                <thead class="results-tableheaderrow">
                                    <tr>
                                        <th class="results-number" style="width: 2.3em">#</th>
                                        <th class="results-number" style="width: 5em">Member #</th>
                                        <th class="results-name">Role</th>
                                        <th class="results-name">Name / Ref / Description</th>
                                        <th class="results-name">ID</th>
                                    </tr>
                                </thead>
                                <tbody id="stop-members" class="results-tablerow">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="radio" id="tbg_blindtext_3" name="tbg_blindtext" class="hackbox">
                    <div class="tabcontent">
                        <ul class="tabs">
                          <li><label for="tbg_blindtext_0">Details</label></li>
                          <li><label for="tbg_blindtext_1" class="platforms_stops">Platforms</label></li>
                          <li><label for="tbg_blindtext_2" class="platforms_stops">Stops</label></li>
                          <li><label for="tbg_blindtext_3" class="tab_active">Ways</label></li>
                          <li><label for="tbg_blindtext_4">Others</label></li>
                        </ul>
                        <div class="tableFixHead">
                            <table class="relationtable">
                                <thead class="results-tableheaderrow">
                                    <tr>
                                        <th class="results-number" style="width: 2.3em">#</th>
                                        <th class="results-number" style="width: 5em">Member #</th>
                                        <th class="results-name">Role</th>
                                        <th class="results-name">Name / Ref / Description</th>
                                        <th class="results-name">ID</th>
                                        <!-- <th class="results-symbol">&nbsp;</th> -->
                                    </tr>
                                </thead>
                                <tbody id="route-members" class="results-tablerow">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <input type="radio" id="tbg_blindtext_4" name="tbg_blindtext" class="hackbox">
                    <div class="tabcontent">
                        <ul class="tabs">
                          <li><label for="tbg_blindtext_0">Details</label></li>
                          <li><label for="tbg_blindtext_1" class="platforms_stops">Platforms</label></li>
                          <li><label for="tbg_blindtext_2" class="platforms_stops">Stops</label></li>
                          <li><label for="tbg_blindtext_3">Ways</label></li>
                          <li><label for="tbg_blindtext_4" class="tab_active">Others</label></li>
                        </ul>
                        <div class="tableFixHead">
                            <table class="relationtable">
                                <thead class="results-tableheaderrow">
                                    <tr>
                                        <th class="results-number" style="width: 2.3em">#</th>
                                        <th class="results-number" style="width: 5em">Member #</th>
                                        <th class="results-name">Role</th>
                                        <th class="results-name">Name / Ref / Description</th>
                                        <th class="results-name">ID</th>
                                    </tr>
                                </thead>
                                <tbody id="other-members" class="results-tablerow">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            </div>
            <script>
                showrelation();
            </script>

            <iframe style="display:none" id="hiddenIframe" name="hiddenIframe"></iframe>

        </main> <!-- main -->

        <hr class="clearing" />

<?php include $inc_lang.'footer.inc' ?>

      </div> <!-- wrapper -->

    </body>
</html>
