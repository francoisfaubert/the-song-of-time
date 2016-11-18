(function(window, document, undefined){
    var Clock = window.Clock = function() {

        this.dom = {
            "seconds"  : document.querySelector("#clock .seconds span"),
            "minutes"  : document.querySelector("#clock .minutes span"),
            "hour"  : document.querySelector("#clock .hour span"),
            "date"   : document.querySelector("#clock .date span"),
            "month" : document.querySelector("#clock .month span"),
            "year"  : document.querySelector("#clock .year span")
        };

        this.values = null;
        this.tickId = 0;
        this.listeners = [];
    };

    Clock.prototype = {
        on : function(type, fn) {
            if (typeof this.listeners[type] == "undefined") {
                this.listeners[type] = [];
            }

            this.listeners[type].push(fn);
        },

        fire : function (type) {
            if (this.listeners.hasOwnProperty(type)) {
                for (var i = 0, len = this.listeners[type].length; i < len; i++) {
                    this.listeners[type][i].apply(null, this);
                }
            }
        },

        tick : function() {

            var moment = window.moment();
            tickId = moment.format("X");

            if (this.tickId != tickId) {
                this.tickId = tickId;
                this.values = {
                    "seconds"  : parseInt(moment.format("ss"), 10),
                    "minutes"  : parseInt(moment.format("mm"), 10),
                    "hour"  : parseInt(moment.format("h"), 10),
                    "date"   : parseInt(moment.format("DD"), 10),
                    "day"   : parseInt(moment.format("DDD"), 10),
                    "month" : parseInt(moment.format("MM"), 10),
                    "year"  : parseInt(moment.format("YYYY"), 10)
                };

                this.render();
                this.fire("tick");
            }

            setTimeout(this.tick.bind(this), 500);
        },

        render : function() {
            for(var i in this.values) {
                if (this.dom.hasOwnProperty(i)) {
                    this.dom[i].innerHTML = this.values[i];
                }
            }
        }
    };
})(window, document);