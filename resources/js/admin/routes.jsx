import React from 'react';
import {Redirect, Route, Switch} from 'react-router-dom';
import {MemoryRouter as Router} from 'react-router';
import HomeAdmin from "./home";

export default class AdminRoutes extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            actualPath: sessionStorage.getItem('adminPath')
        }
    }

    render() {
        return (
            <Router>
                <Switch>
                    <Route path="/admin" exact>
                        {!this.state.actualPath
                            ? <HomeAdmin/>
                            : <Redirect to={this.state.actualPath}/>
                        }
                    </Route>
                    <Route path="/admin">
                        <HomeAdmin/>
                    </Route>
                </Switch>
            </Router>
        )
    }
}