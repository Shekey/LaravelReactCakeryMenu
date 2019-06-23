import React, { Component } from 'react';

export default class Footer extends Component {
    render() {
        return (
            <div>
                <footer>
                    <div className="container">
                        <div className="footer-social-icons">
                            <div className="row justify-content-center">
                                <div className="col-md-4 col-sm-12">
                                    <h4 className="_14 text-center">Caffe slastičarna Aldi</h4>
                                    <ul className="social-icons">
                                        <li><a href="https://www.facebook.com/SlasticarnicaAldi/" className="social-icon"> <i className="fa fa-facebook"></i></a></li>
                                        <li><a href="https://goo.gl/maps/XfiqPkcgy6s" className="social-icon"> <i className="fa fa-map-marker"></i></a></li>
                                        <li><a href="tel:36763689308" className="social-icon"> <i className="fa fa-phone"></i></a></li>
                                        <li><a href="https://www.instagram.com/caffealdi" className="social-icon"> <i className="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                                <div className="col-md-4 col-sm-12">
                                    <h4 className="_14 text-center">Caffe slastičarna Aldi2</h4>
                                    <ul className="social-icons">
                                        <li><a href="https://www.facebook.com/slasticarnaaldi2/" className="social-icon"> <i className="fa fa-facebook"></i></a></li>
                                        <li><a href="https://goo.gl/maps/f5EVjSmzKo22" className="social-icon"> <i className="fa fa-map-marker"></i></a></li>
                                        <li><a href="tel:38763639289" className="social-icon"> <i className="fa fa-phone"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div className="text-details text-center">
                            <p className="copyright">&copy; Caffe Slasticarna Aldi 2018</p>
                        </div>
                    </div>
                </footer>
            </div>
        );
    }
}