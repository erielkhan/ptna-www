<!DOCTYPE html>
<html lang="en">

<?php $title="GTFS Analysis Details"; include('html-head.inc'); ?>

<?php include('../script/globals.php'); ?>
<?php include('../script/gtfs.php'); ?>

    <body>

      <div id="wrapper">

<?php include "header.inc" ?>

        <main id="main" class="results">

<?php $network  = $_GET['network'];
      $topic    = $_GET['topic'];
      $duration = 0;
?>

            <h2 id="details"><img src="/img/GreatBritain16.png" alt="Union Jack" /> GTFS Analysis Details<?php if ( $network ) { echo ' for "' . htmlspecialchars($network) . '"'; } ?></h2>
                <div class="indent">
                    <p>
                    </p>

                    <h3>Analysis Details for Trips</h3>
                        <div class="indent">
                            <table id="gtfs-ptna-table">
                                <thead>
                                    <tr class="statistics-tableheaderrow">
                                        <th class="statistics-name">Route</th>
                                        <th class="statistics-text">Trip</th>
                                        <th class="statistics-text">Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php $duration += CreateAnalysisDetailsForTrips( $network, $topic ); ?>
                                </tbody>
                            </table>
                        </div>


                    <?php printf( "<p>SQL-Queries took %f seconds to complete</p>\n", $duration ); ?>
                </div>

        </main> <!-- main -->

        <hr />

<?php include "footer.inc" ?>

      </div> <!-- wrapper -->
    </body>
</html>