import React from 'react';
import ReactDOM from 'react-dom';
import Login from "./index";

export default class LoginApp extends React.Component {
    render() {
        return (
            <Login/>
        )
    }
}
if (document.getElementById('loginApp')) {
    ReactDOM.render(<LoginApp/>, document.getElementById('loginApp'));
}
