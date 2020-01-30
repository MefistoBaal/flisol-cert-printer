import React from 'react';

export default class VerificarCertificado extends React.Component {
    constructor(props) {
        super(props);
        localStorage.setItem('userPath', '/verificar')
    }

    render() {
        return (
            <h1>Verificar component</h1>
        )
    }
}