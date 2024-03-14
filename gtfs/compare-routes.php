<!DOCTYPE html>
<?php   include( '../script/globals.php'      );
        include( '../script/parse_query.php'  );
        $lang_dir="../$ptna_lang/";
?>
<html lang="<?php echo $html_lang ?>">

<?php   include '../en/gtfs-compare-strings.inc';
        if ( file_exists($lang_dir.'gtfs-compare-strings.inc') ) {
            include $lang_dir.'gtfs-compare-strings.inc';
        }
        include( '../script/gtfs.php'         );
        include( '../script/gtfs-compare.php' );
        if ( $osm_relation ) {
            $title="Compare GTFS route with OSM route_master";
        } else {
            $title="Compare GTFS route with GTFS route";
        }
        include $lang_dir.'html-head.inc';
?>

    <body>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <script src="/script/gtfs-compare.js"></script>
        <script src="/script/sort-table.js"></script>

        <div id="wrapper">

<?php   include $lang_dir.'header.inc'; ?>

            <main id="main" class="results">

<?php if ( isset($_GET['test']) ): ?>
                <?php
                    if ( $osm_relation ) {
                        echo '<h2 id="compare-routes">Compare GTFS route with OSM route_master</h2>' . "\n";
                    } else {
                        echo '<h2 id="compare-routes">Compare two GTFS routes</h2>' . "\n";

                    }
                ?>
                <div class="indent">

                    <span id="progress_section"><span style="display: inline-block; width: 13em">Download GTFS (rows): </span><progress id="download_left" value=0 max=10000></progress> <span id="download_left_text" style="display: inline-block; width: 4em; text-align: right">0</span> ms<br/>
                                                <?php
                                                    if ( $osm_relation ) {
                                                        echo '<span style="display: inline-block; width: 13em">Download OSM (columns): </span><progress id="download_right"  value=0 max=10000></progress> <span id="download_right_text"  style="display: inline-block; width: 4em; text-align: right">0</span> ms<br/>' . "\n";
                                                    } else {
                                                        echo '<span style="display: inline-block; width: 13em">Download GTFS (columns): </span><progress id="download_right" value=0 max=10000></progress> <span id="download_right_text" style="display: inline-block; width: 4em; text-align: right">0</span> ms<br/>' . "\n";
                                                    }
                                                ?>
                                                <span style="display: inline-block; width: 13em">Analysis: </span><progress id="analysis" value=0 max=10000></progress> <span id="analysis_text" style="display: inline-block; width: 4em; text-align: right">0</span> ms
                    </span>
                    <ul style="list-style-type: none; padding-left: 0px">
                        <li><span style="display: inline-block; width: 5em">Rows:</span>
                            <?php
                                if ( $feed && $route_id && preg_match("/^[0-9A-Za-z_.-]+$/", $feed) ) {
                                    $feed_parts = explode( '-', $feed );
                                    $countrydir = array_shift( $feed_parts );
                                    if ( $release_date ) {
                                        echo '<span style="display: inline-block; width: 9em">GTFS route</span> <a href="/gtfs/' . $countrydir . '/trips.php?feed=' . urlencode($feed) . '&release_date=' . urlencode($release_date) . '&route_id=' . urlencode($route_id) . '" title="Link to GTFS" target="_blank">' .  htmlspecialchars($route_id) . '</a> of ' . htmlspecialchars($feed) . ', Version: ' . htmlspecialchars($release_date);
                                    } else {
                                        echo '<span style="display: inline-block; width: 9em">GTFS route</span> <a href="/gtfs/' . $countrydir . '/trips.php?feed=' . urlencode($feed) . '&release_date=' . urlencode($release_date) . '&route_id=' . urlencode($route_id) . '" title="Link to GTFS" target="_blank">' .  htmlspecialchars($route_id) . '</a> of ' . htmlspecialchars($feed);
                                    }
                                }
                                else {
                                    echo 'No valid GTFS data specified for first source';
                                }
                            ?>
                        </li>
                        <li><span style="display: inline-block; width: 5em">Columns:</span>
                            <?php
                                if ( $osm_relation ) {
                                    echo '<span id="compare-routes-columns-name" style="display: inline-block; width: 9em">OSM route_master</span> <a href="https://osm.org/relation/' . urlencode($osm_relation) . '" title="Link to OSM" target="_blank">' . htmlspecialchars($osm_relation) . '</a>';
                                }
                                else if ( $feed2 && $route_id2 && preg_match("/^[0-9A-Za-z_.-]+$/", $feed2) ) {
                                    $feed_parts = explode( '-', $feed2 );
                                    $countrydir = array_shift( $feed_parts );
                                    if ( $release_date2 ) {
                                        echo '<span id="compare-routes-columns-name" style="display: inline-block; width: 9em">GTFS route</span> <a href="/gtfs/' . $countrydir . '/trips.php?feed=' . urlencode($feed2) . '&release_date=' . urlencode($release_date2) . '&route_id=' . urlencode($route_id2) . '" title="Link to GTFS" target="_blank">' .  htmlspecialchars($route_id2) . '</a> of ' . htmlspecialchars($feed2) . ', Version: ' . htmlspecialchars($release_date2);
                                    } else {
                                        echo '<span id="compare-routes-columns-name" style="display: inline-block; width: 9em">GTFS route</span> <a href="/gtfs/' . $countrydir . '/trips.php?feed=' . urlencode($feed2) . '&release_date=' . urlencode($release_date2) . '&route_id=' . urlencode($route_id2) . '" title="Link to GTFS" target="_blank">' .  htmlspecialchars($route_id2) . '</a> of ' . htmlspecialchars($feed2);
                                    }
                                }
                                else {
                                    echo 'No valid OSM or GTFS data specified for second source';
                                }
                            ?>
                        </li>
                    </ul>

                    <div class="tableFixHeadCompare" id="routes-table-div" style="height: 300px; max-height: 560px">
                        <table id="routes-table" class="js-sort-table">
                            <thead id="routes-table-thead" class="compare-routes-thead">
                            </thead>
                            <tbody id="routes-table-tbody" class="compare-routes-tbody">
                            </tbody>
                            <tfoot id="routes-table-tfoot" class="compare-routes-tfoot">
                            </tfoot>
                        </table>
                    </div>
<?php else: ?>
                <h2 id="compare-routes">Compare GTFS route with OSM route_master</h2>
                <div class="indent">

                    <p>
                        <span style="background-color: orange; font-weight: 1000; font-size:2.0em;">This is proof-of-concept (manually compiled) data based on a specific bus: DE-BY-MVV Bus 210.<br/>Just to discuss the layout of this page, ...</span>
                    </p>
                        <?php CreateCompareRoutesTable( $feed, $feed2, $release_date, $release_date2, $route_id, $route_id2, $osm_relation, $ptna_lang ); ?>
<?php endif; ?>
                    <p>Small values indicate a good match between GTFS trip and OSM route.</p>
                    <p>For a more detailed comparison, click on a number.</p>
                    <p>Colours are calculated as follows:</p>
                    <ul>
                    <li><span style="background-color: #6aef00;">0 <= score < 2</span></li>
                    <li><span style="background-color: #aecd00;">2 <= score < 12</span></li>
                    <li><span style="background-color: #d7a700;">12 <= score < 24</span></li>
                    <li><span style="background-color: #f17a00;">24 <= score < 48</span></li>
                    <li><span style="background-color: #fe4000;">48 <= score</span></li>
                    </ul>
                    <p>Move the mouse over a cell and it will pop-up a list of individual scores (yet to be done).</p>
                    <ul>
                        <li>xS == number of stops differ by "x%"</li>
                        <li>(a,b,c)P == percentage of stops where positions differ by more than 20 / 100 / 1000 meters</li>
                        <li>xN == percentage of stops where the 'name' differs (GTFS-'stop_name' / OSM-'name')</li>
                        <li>xR == percentage of stops where the GTFS-'stop_name' differs from OSM-'ref_name' (if tagged)</li>
                        <li>xI == percentage of stops where the GTFS-'stop_id' differ (GTFS/GTFS comparison)</li>
                        <li>xG == percentage of stops where the GTFS-'stop_id' differs from OSM-'gtfs:stop_id' (if tagged)</li>
                        <li>xF == percentage of stops where the GTFS-'stop_id' differs from OSM-'ref:IFOPT' (if tagged)</li>
                    </ul>
                </div>
<?php if ( isset($_GET['test']) ): ?>
                <span id="hiddenmap"></span>
                <script>
                    showroutecomparison();
                </script>
<?php endif; ?>

            </main> <!-- main -->

            <hr />

<?php include $lang_dir.'gtfs-footer.inc' ?>

        </div> <!-- wrapper -->
    </body>
</html>
