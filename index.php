<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
        <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

        <title>  
            The Music of Time  
        </title>

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/favicon.ico">

        <script>
        /*var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-146052-10']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();*/
        </script>

        <style type="text/css">
            .keys {           
                background:#999;
                box-shadow: 0 2px 10px #000;
                padding:5px 3px 3px;
            }

            .keys div {
                float:left;        
            }

            .keys i {
                display:block;
                height:48px;        
                background:#fff;
                border-left:1px solid #ccc;
                margin:0 1px 2px;
                box-shadow: 0 1px 3px #000;
            }

        </style>


  </head>
  <body>
        <section id="keys">
            <?php 
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
                <div class="keys <?php echo $instrument; ?>">
                    <?php foreach($notes as $note) : ?>
                        <div style="width: <?php echo 100 / count($notes); ?>%;">
                            <i></i>
                            <audio type="audio/mpeg" src="<?php echo $note; ?>"></audio>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </section>
        <button id="toggle">Play / Stop</button>


    <!-- Prepare the audio clips -->
    <script>
        var Maestro = function() {
            this.playing = false;
            this.barLength = 8;
            this.position = 0;
        };

        Maestro.prototype = {

            playSound : function(audioTag, delay) {
                console.log(arguments);

                if(delay != undefined && delay > 0) {
                    var scope = this;
                    setTimeout( function() { scope.playSound(audioTag); }, delay);                     
                    return;
                }

                if(audioTag.readyState == 4) {
                    audioTag.volume = 0
                    audioTag.currentTime = 0;
                    audioTag.volume = 1;
                    audioTag.play();
                }
            },


            // la guit devrait creer son loop lui même
            // dependamment dou elle est rendue. Grave aigue, grave aigue, autre accord, son aigue, autre accord, son aigue, loop
            composeGuitar : function () {           
                if (this.playing) {

                    var audio = document.querySelectorAll(".guitar audio"),
                        seconds = Date.now() % 10,
                        scope = this;

                    this.playSound(audio[seconds]);
                    this.playSound(audio[seconds + 3], 500);
                    this.playSound(audio[seconds + 5], 1000);

                    setTimeout(function() { scope.composeGuitar(); }, 2000); 
                }
            },

            composeMandolin : function () {                
                if (this.playing) {

                    var audio = document.querySelectorAll(".mandolin audio"),
                        seconds = Date.now() % 10,
                        scope = this;

                    this.playSound(audio[seconds]);

                    setTimeout(function() { scope.composeMandolin(); }, 1000);
                }
            },

            compose : function() {
                this.composeGuitar();
                this.composeMandolin();
            },

            stop : function() {
                this.playing = false;
            },

            start : function() {
                this.playing = true;
                this.compose();
            },

            toggle : function() {
                (!this.playing) ? this.start() : this.stop();
            }
        }
    </script>

        <script>
            var maestro = new Maestro();
                //C–E–F–G–B–C
                //http://en.wikipedia.org/wiki/Pentatonic_scale
                //http://www.philharmonia.co.uk/explore/make_music

            // Tie in the click event on the keyboard
            document.getElementById("keys").addEventListener("click", function(event) {                
                if (event.srcElement.tagName.toLowerCase() == "i") {
                    maestro.playSound(event.srcElement.nextSibling);                   
                }
            });

            document.getElementById("toggle").addEventListener("click", function() {
                maestro.toggle();                
            });


        </script>
    </body>
</html>
