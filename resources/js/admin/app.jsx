import React from 'react';
import ReactDOM from 'react-dom';
import AdminRoutes from "./routes";

export default class AdminApp extends React.Component {
    render() {
        return (
            <AdminRoutes/>
        );
    }
}
if (document.getElementById('adminApp')) {
    ReactDOM.render(<AdminApp/>, document.getElementById('adminApp'))
}