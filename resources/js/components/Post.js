import React from "react";

import { Fragment } from "react/cjs/react.production.min";

function Post(props) {

    return (
        <Fragment>
            <div>
                <div className="post">
                    <div className="card-avatar">
                        <div className="card-avatar-left">
                            <img src={props.avatar} alt="Avatar" />
                        </div>
                        <div className="card-avatar-right">
                            <h6>{props.name}</h6>
                            <p>
                                {props.time} <i className="far fa-clock" />
                            </p>
                        </div>
                        <div className="card-avatar-more">
                            <i className="fas fa-ellipsis-h" />
                        </div>
                    </div>
                    <div className="post-title">
                    {props.title}
                    </div>
                    <div className="post-body">
                        <img src={props.image} alt="Title" />
                        <div className="row reaction">
                            <div className="col-md-3">
                                <i className="far fa-heart" />
                                {props.like}
                            </div>

                            <div className="col-md-6" />
                        </div>
                    </div>
                </div>
            </div>
        </Fragment>
    );
}

export default Post;
