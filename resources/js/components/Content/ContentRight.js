import axios from "axios";

import react, { useEffect, useState } from "react";
import { Fragment } from "react/cjs/react.production.min";

function ContentRight() {
    const [users, setUser] = useState([]);
    const [id, setId] = useState(0);
    const [follow, setFollow] = useState([0, "false", 0]);
    var list_id = [];

    useEffect(() => {
        axios
            .get("/api/followers")
            .then((res) => {
                for (var i = 0; i < res.data.user.length; i++) {
                    if (res.data.user[i].id == res.data.avatar[i].user_id) {
                        if (list_id.length > 0) {
                            if (
                                list_id
                                    .toString()
                                    .indexOf(res.data.user[i].id) < 0
                            ) {
                                setUser((oldUser) => [
                                    ...oldUser,
                                    [[res.data.user[i], res.data.avatar[i]]],
                                ]);
                            }
                        } else {
                            setUser((oldUser) => [
                                ...oldUser,
                                [[res.data.user[i], res.data.avatar[i]]],
                            ]);
                        }
                    }
                }
            })
            .catch((err) => console.log(err));
    }, []);
    useEffect(() => {
        fetch("/api/followers")
            .then((res) => res.json())
            .then(
                (data) => {
                    setId(data.id_user);
                    for (var i = 0; i < data.id_user_follow.length; i++) {
                        list_id.push(Object.values(data.id_user_follow[i]));
                    }
                },
                (error) => {
                    this.setState({
                        isLoaded: true,
                        error,
                    });
                }
            );
    }, [follow]);

    useEffect(() => {
        axios
            .post("/api/set-followers", {
                user_id: follow[0],
                state: follow[1],
                follower_id: follow[2],
            })
            .then((res) => {})
            .catch((err) => console.log(err));
    }, [follow]);
    return (
        <Fragment>
            {users.map((user) => (
                <Fragment key={user[0][0].id}>
                    <li
                        className={
                            "list-group-item list-group-item-right" +
                            " list-group-item-right-" +
                            user[0][0].id
                        }
                    >
                        <div className="row">
                            <div className="col-8">
                                <div className="cards-user">
                                    <img
                                        src={"/images/" + user[0][1].avatar}
                                        alt="avatar"
                                        className="avatar"
                                    />
                                    <div>
                                        <h6>{user[0][0].name}</h6>
                                        <p>Có thể bạn biết</p>
                                    </div>
                                </div>
                            </div>
                            <div className="col-4" style={{ padding: 0 }}>
                                <button
                                    onClick={(e) => {
                                        e.preventDefault();
                                        setTimeout(() => {
                                            $(
                                                ".list-group-item-right-" +
                                                    user[0][0].id
                                            ).hide();
                                        }, 1000);
                                        if (
                                            follow[1] == "true" &&
                                            follow[0] == user[0][0].id
                                        ) {
                                            setFollow([
                                                user[0][0].id,
                                                "false",
                                                id,
                                            ]);
                                        } else {
                                            setFollow([
                                                user[0][0].id,
                                                "true",
                                                id,
                                            ]);
                                        }
                                    }}
                                >
                                    {follow[1] == "true" &&
                                    user[0][0].id == follow[0] ? (
                                        <h6 style={{ color: "#616161" }}>
                                            Đã theo dõi
                                        </h6>
                                    ) : (
                                        <h6 style={{ color: "#3aacf7" }}>
                                            Theo dõi
                                        </h6>
                                    )}
                                </button>
                            </div>
                        </div>
                    </li>
                </Fragment>
            ))}
        </Fragment>
    );
}

export default ContentRight;
