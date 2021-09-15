import React, { Fragment, useEffect, useState } from "react";
import axios from "axios";

function Notice() {
    const [notices, setNotice] = useState([]);
    const [count,setCount]= useState(0);

    function dropdownNotice() {
        var tab = document.getElementById("dropdown-notice");
        var i = document.getElementById("i-notice");
        var button = document.getElementById("nav-notice");
        window.onclick = function (event) {
            if (!event.target.matches(".nav-notice")&& !event.target.matches(".fa-bell")) {
                if (tab.style.display === "block") {
                    tab.style.display = "none";
                    button.style.backgroundColor = "#dddddd";
                }
            }
        };

        if (tab.style.display === "none") {
            tab.style.display = "block";
            button.style.backgroundColor = "#616161";
        } else {
            tab.style.display = "none";
            button.style.backgroundColor = "#dddddd";
        }
    }

    useEffect(() => {
        axios
            .get(`/api/notice`)
            .then((res) => {
                for(var i = 0;i<res.data.notice.length; i++) {
                    setNotice((oldNotice) => [...oldNotice,res.data.notice[i]])
                }
                setCount(res.data.count);
            })
            .catch((error) => console.log(error));
    }, []);

    return (
        <Fragment>
            <button
                className="nav-notice"
                id="nav-notice"
                onClick={dropdownNotice}
            >
                <div id="count-notice">{count}</div>
                <i
                    className="fas fa-bell"
                    id="i-notice"
                    style={{
                        listStyleImage: "none",
                        display: "block",
                        listStylePosition: "outside",
                        listStyleType: "none",
                        overflowX: "hidden",
                        overflowY: "hidden",
                    }}
                />
            </button>
            <ul className="dropdown-notice" id="dropdown-notice">
                    {notices.map(notice => (
                        <li key={notice.id} className="dropdown-notice-item">{notice.content}</li>
                    )) }

            </ul>
        </Fragment>
    );
}

export default Notice;
