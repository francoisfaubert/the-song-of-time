(function(){
    var Clock = window.Clock = function() {
        this.dom = {
            "time" : document.querySelector(".clock .time"),
            "day" : document.querySelector(".clock .day"),
            "month" : document.querySelector(".clock .month"),
            "year" : document.querySelector(".clock .year")
        };
    };

    Clock.prototype = {
        
        formatNumber : function(number) {
            return (number < 10) ? "0" + number : number;
        },

        tick : function() {
            var date = new Date(),
                fmt = this.formatNumber,
                scope = this;

            this.dom.time.innerHTML = date.getHours() + ":" + fmt(date.getMinutes()) + "." + fmt(date.getSeconds());
            setTimeout(function(){ scope.tick(); }, 500); // give it time to resync
        }
    };
})();