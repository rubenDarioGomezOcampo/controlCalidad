<?php ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Seguimiento a buque</title>
    <link rel="stylesheet" href="css/min.css">

    <script type="text/javascript">
    // Map appearance
    /*
    var width="100%";         // width in pixels or percentage
    var height="300";         // height in pixels
    var names=true;           // always show ship names (defaults to false)

    // Single ship tracking
    var imo="9679919";        // display latest position (by IMO, overrides MMSI)
    var show_track=true;      // display track line (last 24 hours)
    var zoom="3";             // initial zoom (between 3 and 18)
    */
    </script>
    <!--<script type="text/javascript" src="https://www.vesselfinder.com/aismap.js"></script>-->

</head>
<body>

<!--Ventana emergente MODAL-->
                <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Seguimiento a Puerto</h4>
                            </div>
                            <div class="modal-body">
                                <!--Cuerpo del modal-->

                                <script type="text/javascript">
                                    // Map appearance
                                    var width="100%";         // width in pixels or percentage
                                    var height="300";         // height in pixels
                                    var latitude="3.89037";     // center latitude (decimal degrees)
                                    var longitude="-77.07656";    // center longitude (decimal degrees)
                                    var zoom="14";             // initial zoom (between 3 and 18)
                                </script>
                                <script type="text/javascript" src="https://www.vesselfinder.com/aismap.js"></script>

                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin Modal-->






    
</body>
</html>
