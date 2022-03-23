import moment from "moment";

const formatDate = (date) => {
    let x = moment(date).format("LL");
    return x;
};

const formatTime = (time) => {
    moment(time).format("LT");
};
