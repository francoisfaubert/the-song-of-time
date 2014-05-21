<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="The Song of Time: uses the current time to generate a song.">        
        <meta name="author" content="Francois Faubert">

        <title>The Song of Time</title>

        <link rel="shortcut icon" href="../assets/ico/favicon.ico">
        <link href='/css/styles.css' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400' rel='stylesheet' type='text/css'>
    </head>
    <body>
    <?php
        // this could be made static in the long run
        $sources = array(
            "mandolin" => array( 
                "/assets/mp3s/mandolin_G3_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_B3_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_C4_very-long_piano_normal.mp3",

                "/assets/mp3s/mandolin_E4_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_F4_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_G4_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_B4_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_C5_very-long_piano_normal.mp3",

                "/assets/mp3s/mandolin_E5_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_F5_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_B5_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_G5_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_C5_very-long_piano_normal.mp3",

                "/assets/mp3s/mandolin_E6_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_F6_very-long_piano_normal.mp3",
                "/assets/mp3s/mandolin_G6_very-long_piano_normal.mp3"
            ),                    
            "guitar" => array(
                "/assets/mp3s/guitar_E2_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_F2_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_G2_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_B2_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_C3_very-long_forte_normal.mp3",

                "/assets/mp3s/guitar_E3_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_F3_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_G3_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_B3_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_C4_very-long_forte_normal.mp3",

                "/assets/mp3s/guitar_E4_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_F4_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_G4_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_B4_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_C5_very-long_forte_normal.mp3",

                "/assets/mp3s/guitar_E5_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_F5_very-long_forte_normal.mp3",
                "/assets/mp3s/guitar_G5_very-long_forte_normal.mp3"
            )
        );
    ?>
        <?php foreach ($sources as $instrument => $notes) : ?>
            <?php foreach($notes as $note) : ?>
                <audio class="<?php echo $instrument; ?>" type="audio/mpeg" src="<?php echo $note; ?>"></audio>
            <?php endforeach; ?>
        <?php endforeach; ?>

        <section class="clock">
            <div class="time"><em></em></div>
            <div class="month"><?php echo date("F"); ?> <em></em></div>
            <div class="year"><?php echo date("Y"); ?> <em></em></div>
            <div class="day"><?php echo date("l"); ?> <em></em></div>            
        </section>
        <button id="toggle">Play / Stop</button>

        <script src="/js/Maestro.js"></script>
        <script src="/js/Clock.js"></script>
        <script>    
            (new Maestro()).toggle();
            (new Clock()).tick();

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-146052-10']);
            _gaq.push(['_trackPageview']);
            /*(function() {
                var ga = document.createElement('script'); ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();*/
        </script>
    </body>
</html>
