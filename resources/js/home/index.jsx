import React from 'react'

export default class Home extends React.Component {
    constructor(props) {
        super(props);
        localStorage.setItem('userPath', '/home')
    }

    render() {
        return (
            <h1>Home component</h1>
        );
    }
}