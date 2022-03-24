let DateTimePicker = require("date-time-picker");

btn.onclick = function () {
    let options = {
        lang: "EN", // default 'EN'. One of 'EN', 'zh-CN'
        format: "yyyy-MM-dd", // default 'yyyy-MM-dd'
        default: "2016-10-19", // default `new Date()`. If `default` type is string, then it will be parsed to `Date` instance by `format` . Or it can be a `Date` instance
        min: "2016-02-10", // min date value, `{String | Date}`, default `new Date(1900, 0, 1, 0, 0, 0, 0)`
        max: "2018-11-08", // max date value, `{String | Date}`, default `new Date(2100, 11, 31, 23, 59, 59, 999)`
    };

    let config = {
        day: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        shortDay: ["S", "M", "T", "W", "T", "F", "S"],
        MDW: "D, MM-d",
        YM: "yyyy-M",
        OK: "OK",
        CANCEL: "CANCEL",
        CLEAR: "CLEAR",
    };

    var datePicker = new DateTimePicker.Date(options, config);
    datePicker.on("selected", function (formatDate, now) {
        console.log(formatDate, now);
    });
    datePicker.on("cleared", function () {
        // clicked clear btn
    });
};
