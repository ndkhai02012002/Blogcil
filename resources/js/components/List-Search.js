import React from "react";
import ReactDOM from "react-dom";

function ListSearch(props) {
    return (
        <div>

                <li className="list-search-li">
                    <a href={props.link}>{props.name}</a>
                </li>

        </div>
    );
}

export default ListSearch;
