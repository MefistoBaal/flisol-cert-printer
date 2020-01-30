import React from 'react'
import {Link, Redirect, Route, Switch} from "react-router-dom";
import Home from "./index";
import VerificarCertificado from "./verificar";
import {MemoryRouter as Router} from "react-router";

export default class HomeRoutes extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            actualPath: localStorage.getItem('userPath')
        }
    }

    render() {
        return (
            <Router>
                <Link to="/verificar">Verificar</Link>
                <Link to="/home">Consultar</Link>
                <Switch>
                    <Route path="/" exact>
                        {!this.state.actualPath
                            ? <Home/>
                            : <Redirect to={this.state.actualPath}/>
                        }
                    </Route>
                    <Route path="/home">
                        <Home/>
                    </Route>
                    <Route path="/verificar">
                        <VerificarCertificado/>
                    </Route>
                </Switch>
            </Router>
        )
    }

}