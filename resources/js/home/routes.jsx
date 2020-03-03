import React from 'react'
import {Redirect, Route, Switch} from "react-router-dom";
import {MemoryRouter as Router} from "react-router";
import Home from "./index";
import VerificarCertificado from "./verificar";

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