
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Footer from './components/Footer';
import Header from './components/Header';
import PrintAll from './components/PrintAll';

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Footer');

if (document.getElementById('app')) {
    ReactDOM.render(<Footer />, document.getElementById('app'));
}

if (document.getElementById('menu')) {
    ReactDOM.render(<PrintAll />, document.getElementById('menu'));
}

if (document.getElementById('header')) {
    ReactDOM.render(<Header />, document.getElementById('header'));
}

