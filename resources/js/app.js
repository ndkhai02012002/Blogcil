/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */



require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 import React from 'react';
 import ReactDOM from 'react-dom';
import Blog from './components/Blog';
 import ContentCenter from './components/Content/ContentCenter';

 import ContentRight from './components/Content/ContentRight';
 import Nav from './components/Nav';
import Notice from './components/Notice';
import Post from './components/Post';
import Searching from './components/Search';
import Suggestions from './components/Suggestions';


if (document.getElementById('nav')) {
    ReactDOM.render(<Nav />, document.getElementById('nav'));
}


if (document.getElementById('list-post')) {
    ReactDOM.render(<ContentCenter />, document.getElementById('list-post'));
}

if (document.getElementById('content-right')) {
    ReactDOM.render(<ContentRight />, document.getElementById('content-right'));
}

if (document.getElementById('search')) {
    ReactDOM.render(<Searching />, document.getElementById('search'));
}
if (document.getElementById('notice')) {
    ReactDOM.render(<Notice />, document.getElementById('notice'));
}
if (document.getElementById('blog')) {
    ReactDOM.render(<Blog />, document.getElementById('blog'));
}
if (document.getElementById('post')) {
    ReactDOM.render(<Post />, document.getElementById('post'));
}
if (document.getElementById('suggestions')) {
    ReactDOM.render(<Suggestions />, document.getElementById('suggestions'));
}
