import React from 'react';
import {Link} from 'react-router-dom';

export default class Home extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            isValidating: false
        };
        this.submitConsult = this.submitConsult.bind(this);
        localStorage.setItem('userPath', '/home');
    }

    submitConsult(event) {
        event.preventDefault();
        this.setState({isValidating: true});
        fetch('/api/consulta/certificado', {
            method: 'POST',
            body: new FormData(event.target)
        }).then(response => {
            if (response.ok)
                return response.json()
        }).then(data => {
            this.setState({isValidating: false});
            console.log(data)
        })
    }

    render() {
        const {isValidating} = this.state;
        return (
            <div className="page-wrapper">
                <div className="page-content--bge5">
                    <div className="container">
                        <div className="login-wrap">
                            <div className="login-content">
                                <div className="login-logo align-content-center">
                                    <img src="images/flisol_negativo.png" alt="FliSol"/>
                                </div>
                                <div className="login-form">
                                    <p>Consulta tu certificado de asistenca a FliSol</p>
                                    <form onSubmit={this.submitConsult}>
                                        <div className="form-group">
                                            <input className="au-input au-input--full" type="text" name="document" required disabled={isValidating}/>
                                        </div>
                                        <button className="au-btn au-btn--block au-btn--green m-b-20" type="submit" disabled={isValidating}>Consultar</button>
                                        <div className="social-login-content">
                                            <div className="social-button">
                                                <Link to="/verificar">
                                                    <button type="button" className="au-btn au-btn--block au-btn--blue m-b-20">Validar
                                                        mi certificado
                                                    </button>
                                                </Link>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}