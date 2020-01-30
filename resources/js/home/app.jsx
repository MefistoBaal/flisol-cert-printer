import React from 'react'
import ReactDOM from 'react-dom'
import HomeRoutes from "./routes";

export default class HomeApp extends React.Component {
    render() {
        return (
            <HomeRoutes/>
        )
    }
}

if (document.getElementById('homeApp')) {
    ReactDOM.render(<HomeApp/>, document.getElementById('homeApp'))
}