import React from 'react';
import {Link} from "react-router-dom";

export default class VerificarCertificado extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            isValidating: false
        };
        this.submitValidation = this.submitValidation.bind(this);
        localStorage.setItem('userPath', '/verificar')
    }

    submitValidation(event) {
        event.preventDefault();
        this.setState({isValidating: true});
        fetch('/api/consulta/verificar', {
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
                                    <p>Valida tu certificado de asistenca a FliSol</p>
                                    <form onSubmit={this.submitValidation}>
                                        <div className="form-group">
                                            <input className="au-input au-input--full" type="text" name="validate_code" required disabled={isValidating}/>
                                        </div>
                                        <button className="au-btn au-btn--block au-btn--blue m-b-20" type="submit" disabled={isValidating}>Validar</button>
                                        <div className="social-login-content">
                                            <div className="social-button">
                                                <Link to="/home">
                                                    <button type="button" className="au-btn au-btn--block au-btn--green m-b-20">Conusltar
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