(function(window, document, undefined){

    var scale = ["c", "e", "f", "g", "b"];

    var Guitar = window.Guitar = function(clock) {
        this.clock = clock;
    };

    Guitar.prototype = {

        getNote : function (variant) {
            while (variant >= scale.length) {
                variant -= scale.length;
            }

            return scale[variant];
        },

        getBarAudio : function(bar, clock) {
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
            var rootVoice = this.getNote(this.clock.values.year % scale.length);
            var rootVariations = document.querySelectorAll("audio.guitar." + rootVoice);

            var secondVoice = this.getNote(this.clock.values.month % scale.length);
            var secondVoiceVariations = document.querySelectorAll("audio.guitar." + secondVoice);

            return [
                rootVariations[this.clock.values.year % rootVariations.length],
                secondVoiceVariations[this.clock.values.month % secondVoiceVariations.length]
            ];
        },

        getFourthBar : function() {
            var rootVoice = this.getNote((this.clock.values.seconds + this.clock.values.year) % scale.length);
            var rootVariations = document.querySelectorAll("audio.guitar." + rootVoice);

            var secondVoice = this.getNote((this.clock.values.seconds + this.clock.values.month) % scale.length);
            var secondVoiceVariations = document.querySelectorAll("audio.guitar." + secondVoice);

            return [
                rootVariations[this.clock.values.year % rootVariations.length],
                secondVoiceVariations[this.clock.values.month % secondVoiceVariations.length]
            ];
        }
    }

})(window, document);