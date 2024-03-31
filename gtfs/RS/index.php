<!DOCTYPE html>
<?php   include( '../../script/globals.php'     );
        include( '../../script/parse_query.php' );
        include( '../../script/gtfs.php'        );
?>
<html lang="<?php echo $html_lang ?>">

<?php $title="GTFS Analysis"; $lang_dir="../../$ptna_lang/"; include $lang_dir.'html-head.inc'; ?>

    <body>
      <div id="wrapper">
<?php include $lang_dir.'header.inc' ?>
<?php $duration = 0; ?>
        <main id="main" class="results">

            <h2 id="RS"><a href="index.php"><img src="/img/Serbia32.png"  class="flagimg" alt="Flag of Serbia" /></a> GTFS Analysis for Serbia</h2>
            <div class="indent">
<?php include $lang_dir.'gtfs-head.inc' ?>
                <table id="gtfsRS">
                    <thead>
<?php include $lang_dir.'gtfs-trth.inc' ?>
                    </thead>
                    <tbody>
<?php
    $duration += CreateGtfsEntry( "RS-00-BGPREVOZ" );
    $duration += CreateGtfsEntry( "RS-01-SUTRANS" );
    $duration += CreateGtfsEntry( "RS-12-KGBUS" );
    $duration += CreateGtfsEntry( "RS-16-GP-UZICE" );
    $duration += CreateGtfsEntry( "RS-20-JGP-NIS" );
    ?>
                    </tbody>
                </table>

                <?php printf( "<p>SQL-Queries took %f seconds to complete</p>\n", $duration ); ?>
            </div>
        </main> <!-- main -->

        <hr />

<?php include $lang_dir.'gtfs-footer.inc' ?>

      </div> <!-- wrapper -->
    </body>
</html>
