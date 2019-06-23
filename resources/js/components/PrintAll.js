import React, { Component } from 'react';
import axios from 'axios';
import { throws } from 'assert';

class Artikli extends Component {
    render() {
        return (
            <div className="menu-item">
                <div className="text"><div className="badge badge-secondary counter"></div>{this.props.obj.naziv}</div>
                <div className="desc">{this.props.obj.opis}</div>
            </div>
        )
    }
}

class Podkategorije extends Component {
    render() {
        return (
            <div className="col-md-12">
                {console.log(this.props)}
                <input type="checkbox" id={this.props.id} className="accordion-menu"></input>
                <label className="category-tag" htmlFor={this.props.id}>{this.props.podkategorija}</label>
                <article className="no-image justify-content-center">
                    <div className="card">
                        <img className="card-img-top" src={this.props.obj[0].slikaUrl} alt="Card image cap" />
                    </div>
                    <div className="menu-wrap">
                        <div className="text text-center mb-2">Vrste napitaka:</div>
                            {this.props.obj.map((item, i) => <Artikli obj={item} key={i} />)}
                        </div>                    
                </article>
            </div>
        )
    }
}

class UnMounted extends Component {
    state = {
        podkategorije: [],
        podkategorijaFormated: [],
        keys: []
    }
    constructor(props) {
        super(props);
        this.state.podkategorije.push(this.props.obj[1]);
        this.state.podkategorijaFormated = this.state.podkategorije[0].reduce((podkategorije, { podkategorija, naziv, opis, slikaUrl }) => {
            if (!podkategorije[podkategorija]) {
                podkategorije[podkategorija] = [];
                this.state.keys.push(podkategorija);
            }
            podkategorije[podkategorija].push({ naziv, opis, podkategorija, slikaUrl });

            return podkategorije;
        }, {})
    }
    render() {
        return (
            <div>
                <input type="checkbox" id={this.props.id} className="accordion-menu"></input>
                <label className="category-tag" htmlFor={this.props.id}>{this.props.obj[0]}</label>
                <article className="no-image justify-content-center">
                    {this.state.keys.map((item, i) => <Podkategorije obj={this.state.podkategorijaFormated[item]} id={`a-${Math.random()}`} podkategorija={item} key={i} />)}
                </article>
            </div>
        );
    }
}

export default class PrintAll extends Component {
    state = {
        kategorije: [],
    }
    componentDidMount() {
        axios.get(`http://127.0.0.1:8000/api/artikli`)
            .then(res => {
                return res.data.data;
            })
            .then(this.parseData)
    }

    parseData = (data) => {
        const map = new Map();
        data.forEach((item) => {
            const key = item.kategorija;
            const collection = map.get(key);
            if (!collection) {
                map.set(key, [item]);
            } else {
                collection.push(item);
            }
        });
        let arrayObject = Array.from(map);
        this.setState({ kategorije: arrayObject });
        return data;
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-12">
                        {this.state.kategorije.map((object, i) => <UnMounted obj={object} id={i} key={i} />)}
                    </div>
                </div>
            </div>
        );
    }
}
