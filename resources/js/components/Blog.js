import React, { useEffect, useState } from "react";
import axios from "axios";
import { Fragment } from "react/cjs/react.production.min";

function Blog() {
    var currentDate = new Date();
    const [hide, setHide] = useState("true");
    const [blogs, setBlog] = useState([]);

    useEffect(() => {
        axios.get("/api/blogs").then((res) => {
            for (var i = 0; i < res.data.blog_has_follows.length; i++) {
                if (res.data.blog_has_follows[i].length > 0) {
                    for (
                        var j = 0;
                        j < res.data.blog_has_follows[i].length;
                        j++
                    ) {
                        if (
                            res.data.blog_has_follows[i][j].user_id ==
                                res.data.list_avatar[i][0].user_id &&
                            res.data.blog_has_follows[i][j].user_id ==
                                res.data.list_name[i][0].id
                        ) {
                            var score =
                                Date.parse(currentDate) -
                                Date.parse(
                                    res.data.blog_has_follows[i][j].created_at
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
                            setBlog((oldBlog) => [
                                ...oldBlog,
                                [
                                    res.data.blog_has_follows[i][j],
                                    res.data.list_avatar[i][0],
                                    res.data.list_name[i][0],
                                    score,
                                ],
                            ]);
                        }
                    }
                }
            }
        });
    }, []);

    return (
        <Fragment>
            {blogs.map((blog) => (
                <div key={blog[0].id}>
                    <div
                        className="blog"
                        onLoad={setTimeout(() => setHide("false"), 1000)}
                    >
                        <div className={hide == "true" ? "hide" : ""}>
                            <div className="card-avatar">
                                <div className="card-avatar-left">
                                    <img
                                        src={"/images/" + blog[1].avatar}
                                        alt="Avatar"
                                    />
                                </div>
                                <div className="card-avatar-right">
                                    <h6>{blog[2].name}</h6>
                                    <p>
                                        {blog[3]} <i className="far fa-clock" />
                                    </p>
                                </div>
                                <div className="card-avatar-more">
                                    <i className="fas fa-ellipsis-h" />
                                </div>
                            </div>
                            <a
                                href={"/blogs/" + blog[0].id}
                                style={{ textDecoration: "none" }}
                            >
                                <div className="blog-body">
                                    <img
                                        src={"/images/" + blog[0].image_title}
                                        alt="Title"
                                    />
                                    <div className="blog-title">
                                        {blog[0].title}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            ))}
        </Fragment>
    );
}

export default Blog;
