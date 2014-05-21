(function(window, document, undefined){

                //C–E–F–G–B–C
                //http://en.wikipedia.org/wiki/Pentatonic_scale
                //http://www.philharmonia.co.uk/explore/make_music
    var Maestro = window.Maestro = function() {
        this.playing = false;
        this.barLength = 8;
        this.position = 0;

        this.addEvents();
    };

    Maestro.prototype = {

        addEvents : function() {
            var scope = this;

            document.getElementById("toggle").addEventListener("click", function() {
                scope.toggle();                
            });
        },

        playSound : function(audioTag, delay) {
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

                var audio = document.querySelectorAll("audio.guitar"),
                    seconds = Date.now() % 10,
                    scope = this;

                this.playSound(audio[seconds]);
                this.playSound(audio[seconds + 3], 500);
                this.playSound(audio[seconds + 5], 1000);

                setTimeout(function() { scope.composeGuitar(); }, 2000); 
            }
        },

        composeMandolin : function () {                
           /* if (this.playing) {

                var audio = document.querySelectorAll("audio.mandolin"),
                    seconds = Date.now() % 10,
                    scope = this;

                this.playSound(audio[seconds]);

                setTimeout(function() { scope.composeMandolin(); }, 1000);
            }*/
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
})(window, document);