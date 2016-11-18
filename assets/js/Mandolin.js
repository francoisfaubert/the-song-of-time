(function(window, document, undefined){

    var scale = ["g", "e", "b"];

    var Mandolin = window.Mandolin = function(clock) {
        this.clock = clock;
    };

    Mandolin.prototype = {

        getNote : function (variant) {
            while (variant >= scale.length) {
                variant -= scale.length;
            }

            return scale[variant];
        },

        getBarAudio : function(bar) {
            if (bar % 6 === 0) {
                return this.getSixthBar();
            }

            if (bar % 4 === 0) {
                return this.getFourthBar();
            }

            if (bar % 2 === 0) {
                return this.getSecondBar();
            }

            return this.getInBetween();
        },

        getInBetween : function() {
            return [];
        },

        getSecondBar : function() {
            var rootVoice = this.getNote(this.clock.values.seconds % scale.length);
            var rootVariations = document.querySelectorAll("audio.mandolin." + rootVoice);

            return [
                rootVariations[this.clock.values.seconds % rootVariations.length]
            ];
        },

        getFourthBar : function() { 
            var rootVoice = this.getNote(this.clock.values.minutes % scale.length);
            var rootVariations = document.querySelectorAll("audio.mandolin." + rootVoice);

            return [
                rootVariations[this.clock.values.minutes % rootVariations.length]
            ];
        },

        getSixthBar : function() {
            var rootVoice = this.getNote(this.clock.values.hour % scale.length);
            var rootVariations = document.querySelectorAll("audio.mandolin." + rootVoice);

            return [
                rootVariations[this.clock.values.hour % rootVariations.length]
            ];
        }
    }
    
})(window, document);