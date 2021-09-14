import React, { Fragment, useEffect, useState } from "react";
import ListSearch from "./List-Search";
import axios from "axios";

function Searching() {
    const [val, setVal] = useState("");
    const [users, setUser] = useState([]);

    useEffect(() => {
        axios
            .get(`http://127.0.0.1:8000/api/users`)
            .then((res) => {
                var usr = [];

                for (var i = 0; i < res.data.user.length; i++) {

                    var username = res.data.user[i].name.toUpperCase();
                    if (username.indexOf(val) > -1 && val !== "") {
                        usr.push(res.data.user[i]);
                    }
                }
                if(val == "") {
                    usr = [];
                }
                setUser(usr);
            })
            .catch((error) => console.log(error));
    }, [val]);


    return (
        <Fragment>
            <input
                onInput={(e) => {
                    setVal(e.target.value.toUpperCase());
                }}
                style={{
                    zIndex: 3,
                }}
                type="text"
                placeholder="Tìm kiếm trên Blogcil"
            />
            <button
                className="btn"
                style={{
                    zIndex: 3,
                    backgroundColor: "#13b9b3",
                    color: "white",
                    borderBottomLeftRadius: "0px, border-top-left-radius: 0px",
                    height: "100%",
                    width: "50px",
                    borderBottomRightRadius: "24px",
                    borderTopRightRadius: "24px",
                }}
            >
                <i className="fas fa-search" />
            </button>
            <ul className={val ? "list-search" : "hide"}>
                <div className="list-search-div1"></div>
                {users.map((user) => (
                    <ListSearch
                        key={user.id}
                        link={"/profile/" + user.id}
                        name={user.name}
                    />
                ))}
                <div className="list-search-div2"></div>
            </ul>
        </Fragment>
    );
}

export default Searching;
