(function(window, document, undefined){

    var scale = ["b",  "g"];

    var Violin = window.Violin = function(clock) {
        this.clock = clock;
    };

    Violin.prototype = {

        getNote : function (variant) {
            while (variant >= scale.length) {
                variant -= scale.length;
            }

            return scale[variant];
        },

        getBarAudio : function(bar) {
            if (bar == 2) {
                return this.getEightBar();
            }

            return this.getInBetween();
        },

        getInBetween : function() {
            return [];
        },

        getEightBar : function() {
            var rootVoice = this.getNote(parseInt(Math.random() * 2, 10));
            var rootVariations = document.querySelectorAll("audio.violin." + rootVoice);

            return [
                rootVariations[this.clock.values.hour % rootVariations.length]
            ];
        }
    }
    
})(window, document);