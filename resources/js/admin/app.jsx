import React from 'react';
import ReactDOM from 'react-dom';

export default class AdminApp extends React.Component {
    render() {
        return (
            <h2>Admin</h2>
        );
    }
}
if (document.getElementById('adminApp')) {
    ReactDOM.render(<AdminApp/>, document.getElementById('adminApp'))
}