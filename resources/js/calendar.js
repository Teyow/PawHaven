import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import interactionPlugin from "@fullcalendar/interaction";
import moment from "moment";
import axios from "axios";
import swal from "sweetalert";

if (typeof jQuery === "undefined") {
    var script = document.createElement("script");
    script.src = "http://code.jquery.com/jquery-latest.min.js";
    script.type = "text/javascript";
    document.getElementsByTagName("head")[0].appendChild(script);
}

window.onload = function () {
    getUserVisits();
};

let calendarEl = document.getElementById("calendar");

let now = moment();

const clickDate = (info) => {
    if (moment(info.dateStr).format("LT") == "12:00 AM") {
        swal({
            title: "Invalid!",
            text: "Change the view to weeks to select a date with valid time!",
            icon: "error",
        });
    } else {
        swal({
            title: "Date Selected",
            text:
                "Are you sure you want to select " +
                moment(info.dateStr).format("LT") +
                " for your visit?",
            icon: "warning",
            buttons: {
                cancel: "No",
                OK: "Proceed",
            },
        }).then((response) => {
            const formData = new FormData();
            const petId = document.getElementById("petId").value;
            formData.append("date_start", moment(info.dateStr).format());
            formData.append("date_end", moment(info.dateStr).add(60, "m"));
            formData.append("is_approved", false);
            formData.append("pet_id", petId);
            if (response == "OK") {
                axios
                    .post("/addvisit", formData)
                    .then((response) => {
                        console.log(response);
                        swal({
                            title: "Date Saved",
                            text: "Date has been successfully saved!",
                            icon: "success",
                            buttons: false,
                        });
                        window.location =
                            "http://127.0.0.1:8000/adoption/" +
                            petId +
                            "/schedule/success";
                    })
                    .catch((e) => {
                        console.log("error");
                    });
            } else {
                swal({
                    title: "Cancelled",
                    text: "Date has not been saved!",
                    icon: "error",
                });
            }
        });
    }
};
const clickEvent = (info) => {
    swal({
        title: "Remove Visit?",
        text: "Are you sure you want to cancel your visit?",
        icon: "warning",
        buttons: {
            cancel: "No",
            OK: "Proceed",
        },
    }).then((response) => {
        if (response == "OK") {
            axios
                .post("/deletevisit", {
                    id: info.event.id,
                })
                .then((response) => {
                    swal({
                        title: "Deleted!",
                        text: "The scheduled visit has been deleted!",
                        icon: "success",
                    }).then((response) => {
                        info.event.remove();
                    });
                });
        }
    });
};

let userEvents = [];
let calendar = new Calendar(calendarEl, {
    plugins: [dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "Schedule a Visit",
        right: "dayGridMonth,timeGridWeek,listWeek",
    },
    editable: true,
    initialDate: now._d,
    selectable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: userEvents,
    eventsSet: getUserVisits,
    dateClick: clickDate,
    eventClick: clickEvent,
});

const getUserVisits = () => {
    axios.get("/getuservisit").then((response) => {
        let arr = response.data;
        console.log(arr.length);
        for (let i = 0; i < arr.length; i++) {
            let obj = {
                id: arr[i].id,
                start: moment(arr[i].start).format(),
                end: moment(arr[i].end).format(),
            };
            console.log(obj);
            calendar.addEvent(obj);
        }
    });
};

const formatDate = (date) => {
    moment(date).format("LL");
};

const formatTime = (time) => {
    moment(time).format("LT");
};

calendar.render();
