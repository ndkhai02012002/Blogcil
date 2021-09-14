import axios from "axios";
import { Fragment, useEffect, useState } from "react";
import Post from "../Post";

function ContentCenter() {
    var currentDate = new Date();

    const [posts, setPost] = useState([]);
    const [like, setLike] = useState([]);
    const [id, setID] = useState(0);
    useEffect(() => {
        axios.get("/api/posts").then((res) => {
            setID(res.data.id);
            for (var i = 0; i < res.data.post_has_follows.length; i++) {
                if (res.data.post_has_follows[i].length > 0) {
                    for (
                        var j = 0;
                        j < res.data.post_has_follows[i].length;
                        j++
                    ) {
                        if (
                            res.data.post_has_follows[i][j].user_id ==
                                res.data.list_avatar[i][0].user_id &&
                            res.data.post_has_follows[i][j].user_id ==
                                res.data.list_name[i][0].id
                        ) {
                            var score =
                                Date.parse(currentDate) -
                                Date.parse(
                                    res.data.post_has_follows[i][j].created_at
                                );
                            if (score < 3600000) {
                                score = Math.floor(score / 60000) + " phút";
                            } else if (score < 86400000) {
                                score = Math.floor(score / 3600000) + " giờ";
                            } else if (score < 604800000) {
                                score = Math.floor(score / 86400000) + " ngày";
                            } else if (score < 31536000000) {
                                score = Math.floor(score / 604800000) + " tuần";
                            } else {
                                score =
                                    Math.floor(score / 31536000000) + " năm";
                            }

                            if (res.data.post_id.length > 0) {
                                var post_id = [];
                                for (
                                    var k = 0;
                                    k < res.data.post_id.length;
                                    k++
                                ) {
                                    post_id.push(res.data.post_id[k].post_id);
                                }

                                if (
                                    post_id
                                        .toString()
                                        .indexOf(
                                            res.data.post_has_follows[i][
                                                j
                                            ].id.toString()
                                        ) > -1
                                ) {
                                    setPost((oldPost) => [
                                        ...oldPost,
                                        [
                                            res.data.post_has_follows[i][j],
                                            res.data.list_avatar[i][0],
                                            res.data.list_name[i][0],
                                            score,
                                            "true",
                                            res.data.post_has_follows[i][j]
                                                .likes,
                                        ],
                                    ]);
                                } else {
                                    setPost((oldPost) => [
                                        ...oldPost,
                                        [
                                            res.data.post_has_follows[i][j],
                                            res.data.list_avatar[i][0],
                                            res.data.list_name[i][0],
                                            score,
                                            "false",
                                            res.data.post_has_follows[i][j]
                                                .likes,
                                        ],
                                    ]);
                                }
                            } else {
                                setPost((oldPost) => [
                                    ...oldPost,
                                    [
                                        res.data.post_has_follows[i][j],
                                        res.data.list_avatar[i][0],
                                        res.data.list_name[i][0],
                                        score,
                                        "false",
                                        res.data.post_has_follows[i][j].likes,
                                    ],
                                ]);
                            }
                        }
                    }
                }
            }
        });
    }, []);

    useEffect(() => {
        axios
            .post("/api/set_likes", {
                user_id: like[0],
                state: like[1],
                post_id: like[2],
            })
            .then((res) => {})
            .catch((err) => console.log(err));
    }, [like]);

    return (
        <Fragment>
            {posts.map((post) => (
                <div className="post" key={post[0].id}>

                        <div className="card-avatar">
                            <div className="card-avatar-left">
                                <img
                                    src={"/images/" + post[1].avatar}
                                    alt="Avatar"
                                />
                            </div>
                            <div className="card-avatar-right">
                                <h6>{post[2].name}</h6>
                                <p>
                                    {post[3]} <i className="far fa-clock" />
                                </p>
                            </div>
                            <div className="card-avatar-more">
                                <i className="fas fa-ellipsis-h" />
                            </div>
                        </div>
                        <div className="post-title">{post[0].title}</div>
                        <div className="post-body">
                            <img
                                src={"/images/" + post[0].image_title}
                                alt="Title"
                            />
                            <div className="row reaction">
                                <div
                                    className={
                                        post[4] == "true"
                                            ? "col-md-3 like-blue"
                                            : "col-md-3"
                                    }
                                >
                                    <button
                                        className="btn like"
                                        onClick={() => {
                                            if (post[4] == "true") {
                                                key = post[0].id;
                                                setLike([
                                                    id,
                                                    "false",
                                                    post[0].id,
                                                ]);
                                                post[4] = "false";
                                                post[5] -= 1;
                                            } else if (post[4] == "false") {
                                                key = post[0].id;
                                                post[4] = "true";
                                                post[5] += 1;
                                                setLike([
                                                    id,
                                                    "true",
                                                    post[0].id,
                                                ]);
                                            }
                                        }}
                                    >
                                        <i className="fas fa-thumbs-up" />
                                    </button>

                                    {post[5]}
                                </div>

                                <div className="col-md-6" />
                            </div>
                        </div>
                    </div>

            ))}
        </Fragment>
    );
}

export default ContentCenter;
