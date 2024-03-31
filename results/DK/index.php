<!DOCTYPE html>
<html lang="da">

<?php $title="Results"; $inc_lang='../../da/'; include $inc_lang.'html-head.inc'; ?>

<?php include('../../script/entries.php'); ?>

    <body>
      <div id="wrapper">

<?php include $inc_lang.'header.inc' ?>

        <main id="main" class="results">

            <h2 id="LU"><img src="/img/Denmark32.png"  class="flagimg" alt="Flag til Danmark" /> Resultater for Danmark</h2>

<?php include $inc_lang.'results-head.inc' ?>

            <table id="networksDK">
                <thead>
<?php include $inc_lang.'results-trth.inc' ?>
                </thead>
                <tbody>

                    <?php CreateNewFullEntry( "DK-Alle", "da", "Konfiguration" ); ?>

                </tbody>
            </table>

        </main> <!-- main -->

        <hr />

<?php include $inc_lang.'footer.inc' ?>

      </div> <!-- wrapper -->
    </body>
</html>
