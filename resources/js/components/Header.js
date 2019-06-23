import React, { Component } from 'react';

export default class Header extends Component {
    render() {
        return (
            <div>
                <div className="container">
                    <div className="page-header">
                    <a href="/"><h1 className="text-center"> - Caffe Slastičarna Aldi - </h1></a>
                    </div>
                </div>
                <header>
                    <div className="overlay"></div>
                    <video playsInline="playsinline" autoPlay="autoplay" muted="muted" loop="{false}" poster="./assets/poster-welcome.jpg">
                        <source src="./assets/aldi.mp4" type=" video/mp4" /></video>
                </header>
                <div className="row">
                    <div className="col-md-12">
                    </div>
                </div>
            </div>
        );
    }
}
