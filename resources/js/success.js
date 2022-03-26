import moment from "moment";

if (typeof jQuery === "undefined") {
    var script = document.createElement("script");
    script.src = "http://code.jquery.com/jquery-latest.min.js";
    script.type = "text/javascript";
    document.getElementsByTagName("head")[0].appendChild(script);
}

const startDate = $("#start").val();
const endDate = $("#end").val();

window.onload = function () {
    $("#date").text(formatDate(startDate));
    $("#time").text(formatTime(startDate) + " - " + formatTime(endDate));
};

const formatDate = (date) => {
    return moment(date).format("LL");
};

const formatTime = (time) => {
    return moment(time).format("LT");
};
