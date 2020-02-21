import React from 'react';

export default class Home extends React.Component {
    constructor(props) {
        super(props);
        this.submitConsult = this.submitConsult.bind(this);
        localStorage.setItem('userPath', '/home');
    }

    submitConsult(event) {
        event.preventDefault();
        console.log(event)
    }

    render() {
        return (
            <div className="page-wrapper">
                <div className="page-content--bge5">
                    <div className="container">
                        <div className="login-wrap">
                            <div className="login-content">
                                <div className="login-logo align-content-center">
                                    <a><img className="rounded mx-auto d-block" src="images/flisol_negativo.png" alt="FliSol"/></a>
                                </div>
                                <div className="login-form">
                                    <p>Consulta tu certificado de asistenca a FliSol</p>
                                    <form onSubmit={this.submitConsult}>
                                        <div className="form-group">
                                            <input type="text" name="document"/>
                                        </div>
                                        <input type="submit"/>
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