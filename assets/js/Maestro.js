(function(window, document, undefined){


    // var scale = ["c", "d", "e", "f", "g", "a", "b", "c"];


                //C–E–F–G–B–C
                //http://en.wikipedia.org/wiki/Pentatonic_scale
                //http://www.philharmonia.co.uk/explore/make_music
    var Maestro = window.Maestro = function(clock, instruments) {
        this.playing = false;
        this.bar = 0;

        this.instruments = instruments;
    };

    Maestro.prototype = {

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

        playVoices : function(tracks) {
            for (var i = 0, len = tracks.length; i < len; i++) {
                this.playSound(tracks[i]);
            }
        },

        compose : function() {      
            if (this.playing) {
                
                for (var i = 0, len = this.instruments.length; i < len; i++) {
                    this.playVoices(this.instruments[i].getBarAudio(this.bar));
                }

                this.bar++;

                if (this.bar > 15) {
                    this.bar = 0;
                }
            }
        },

        stop : function() {
            this.playing = false;
            this.bar = 0;
        },

        start : function() {
            this.playing = true;
            this.bar = 0;
        },

        toggle : function() {
            (!this.playing) ? this.start() : this.stop();
        }
    }
})(window, document);